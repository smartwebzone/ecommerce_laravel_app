<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideoCategoryApiTest extends TestCase
{
    use MakeVideoCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVideoCategory()
    {
        $videoCategory = $this->fakeVideoCategoryData();
        $this->json('POST', '/api/v1/videoCategories', $videoCategory);

        $this->assertApiResponse($videoCategory);
    }

    /**
     * @test
     */
    public function testReadVideoCategory()
    {
        $videoCategory = $this->makeVideoCategory();
        $this->json('GET', '/api/v1/videoCategories/'.$videoCategory->id);

        $this->assertApiResponse($videoCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVideoCategory()
    {
        $videoCategory = $this->makeVideoCategory();
        $editedVideoCategory = $this->fakeVideoCategoryData();

        $this->json('PUT', '/api/v1/videoCategories/'.$videoCategory->id, $editedVideoCategory);

        $this->assertApiResponse($editedVideoCategory);
    }

    /**
     * @test
     */
    public function testDeleteVideoCategory()
    {
        $videoCategory = $this->makeVideoCategory();
        $this->json('DELETE', '/api/v1/videoCategories/'.$videoCategory->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/videoCategories/'.$videoCategory->id);

        $this->assertResponseStatus(404);
    }
}
