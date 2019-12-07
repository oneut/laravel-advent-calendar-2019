<?php
/**
 * Created by PhpStorm.
 * User: Takashi
 * Date: 2019/12/07
 * Time: 11:04
 */

namespace App\Models\Api;


use Jenssegers\Model\Model;

class GitHubOctocatRepository extends Model
{
    const BASE_URL                     = 'https://api.github.com';
    const OCTOCAT_REPOSITORY_LIST_PATH = '/users/octocat/repos';
    const OCTOCAT_REPOSITORY_PATH      = '/repos/octocat';
    private $client;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => self::BASE_URL,
        ]);
    }

    /**
     * リポジトリ一覧の取得
     *
     * @return \Illuminate\Support\Collection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get()
    {
        $response = $this->client->request('GET', self::OCTOCAT_REPOSITORY_LIST_PATH);
        return collect($this->hydrate(json_decode($response->getBody()->getContents())));
    }

    /**
     * リポジトリ取得
     *
     * @param $repositoryName
     * @return Model
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function findByRepositoryName($repositoryName)
    {
        $response = $this->client->request('GET', self::OCTOCAT_REPOSITORY_PATH . '/' . $repositoryName);
        return $this->newInstance(json_decode($response->getBody()->getContents()));
    }

    /**
     * 省略した概要の取得
     *
     * @return string
     */
    public function getAbbrDescription()
    {
        return mb_strimwidth($this->getAttribute('description'), 0, 10, "...", 'UTF-8');
    }
}
