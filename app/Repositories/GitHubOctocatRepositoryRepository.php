<?php
/**
 * Created by PhpStorm.
 * User: Takashi
 * Date: 2019/12/07
 * Time: 11:27
 */

namespace App\Repositories;


use App\Models\Api\GitHubOctocatRepository;

class GitHubOctocatRepositoryRepository
{
    private $gitHubOctocatRepository;

    public function __construct(GitHubOctocatRepository $gitHubOctocatRepository)
    {
        $this->gitHubOctocatRepository = $gitHubOctocatRepository;
    }

    public function get()
    {
        return $this->gitHubOctocatRepository->get();
    }

    public function findByRepositoryName($repositoryName)
    {
        return $this->gitHubOctocatRepository->findByRepositoryName($repositoryName);
    }
}
