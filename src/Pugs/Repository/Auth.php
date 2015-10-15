<?php

namespace Pugs\Repository;

use Pugs\Application\Config;
use Pugs\Application\Repository;
use Pugs\Entity\Auth as Model;
use Firebase\JWT\JWT;

class Auth extends Repository
{

	/**
	 * Auth model container
	 *
	 * @var Auth
	 */
	protected $auth;

	/**
	 * Config class container
	 *
	 * @var Config
	 */
	protected $config;

	/**
	 * Expiration time for the JWT token
	 *
	 * @var integer
	 */
	protected $expiration = 60 * 60 * 24;
	
	/**
	 * Class constructor
	 *
	 * @param Model $auth
	 * @param Config $config
	 */
	public function __construct(Model $auth, Config $config)
	{
		$this->auth = $auth;
		$this->config = $config;
	}

	/**
	 * Attemps to authenticate the given token
	 *
	 * @param string $token
	 * @return JWT Payload|Exception
	 */
	public function attempt($token)
	{
		try {
			return JWT::decode($token, $this->config->get('app.app_key'), array('HS256'));
		} catch (\Firebase\JWT\InvalidArgumentException $e) {
			return $e;
		} catch (\Firebase\JWT\UnexpectedValueException $e) {
			return $e;
		} catch (\Firebase\JWT\DomainException $e) {
			return $e;
		} catch (\Firebase\JWT\ExpiredException $e) {
			return $e;
		} catch (\Firebase\JWT\SignatureInvalidException $e) {
			return $e;
		}
	}

	/**
	 * Creates an Auth model
	 *
	 * @param array $data
	 * @return Auth
	 */
	public function createAuth($data)
	{
		$auth = $this->mapInserts($this->auth, $data);
		
		$auth->save();

		return $auth;
	}

	/**
	 * Creates the JWT token
	 *
	 * @return string
	 */
	public function createToken()
	{
		$domain = $this->config->get('app.domain');

		$data = [
			'iss' => $domain,
			'aud' => $domain,
			'iat' => time(),
			'exp' => time ()  + $this->expiration,
		];

		$token = JWT::encode($data, $this->config->get('app.app_key'));

		$this->createAuth([
			'token' => $token,
			'expire_at' => $data['exp']
		]);

		return $token;
	}

	/**
	 * Gets an Auth model
	 *
	 * @param integer $id
	 * @return Auth
	 */
	public function find($id)
	{
		return $this->auth->findOrFail($id);
	}

	/**
	 * Gets an Auth model by its `id` or `name`
	 *
	 * @param integer|string
	 * @return array
	 */
	public function getAuth($param)
	{
		return is_numeric($param) ?
			$this->auth->where('id', $param)->first():
			$this->auth->where('token', $param)->first();
	}

	/**
	 * Updates an Auth model
	 *
	 * @param integer $id
	 * @param string $data
	 * @return Auth
	 */
	public function updateAuth($id, $data)
	{
		$auth = $this->find($id);
		$auth = $this->mapInserts($auth, $data);

		$auth->save();

		return $auth;
	}

	/**
	 * Deletes an Auth model
	 *
	 * @param integer $id
	 * @return boolean
	 */
	public function deleteAuth($id)
	{
		$auth = $this->find($id);

		return $auth->delete();
	}

}