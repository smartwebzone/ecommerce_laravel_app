<?php

use App\Models\VideoCategory;
use App\Repositories\VideoCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideoCategoryRepositoryTest extends TestCase
{
    use MakeVideoCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VideoCategoryRepository
     */
    protected $videoCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->videoCategoryRepo = App::make(VideoCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVideoCategory()
    {
        $videoCategory = $this->fakeVideoCategoryData();
        $createdVideoCategory = $this->videoCategoryRepo->create($videoCategory);
        $createdVideoCategory = $createdVideoCategory->toArray();
        $this->assertArrayHasKey('id', $createdVideoCategory);
        $this->assertNotNull($createdVideoCategory['id'], 'Created VideoCategory must have id specified');
        $this->assertNotNull(VideoCategory::find($createdVideoCategory['id']), 'VideoCategory with given id must be in DB');
        $this->assertModelData($videoCategory, $createdVideoCategory);
    }

    /**
     * @test read
     */
    public function testReadVideoCategory()
    {
        $videoCategory = $this->makeVideoCategory();
        $dbVideoCategory = $this->videoCategoryRepo->find($videoCategory->id);
        $dbVideoCategory = $dbVideoCategory->toArray();
        $this->assertModelData($videoCategory->toArray(), $dbVideoCategory);
    }

    /**
     * @test update
     */
    public function testUpdateVideoCategory()
    {
        $videoCategory = $this->makeVideoCategory();
        $fakeVideoCategory = $this->fakeVideoCategoryData();
        $updatedVideoCategory = $this->videoCategoryRepo->update($fakeVideoCategory, $videoCategory->id);
        $this->assertModelData($fakeVideoCategory, $updatedVideoCategory->toArray());
        $dbVideoCategory = $this->videoCategoryRepo->find($videoCategory->id);
        $this->assertModelData($fakeVideoCategory, $dbVideoCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVideoCategory()
    {
        $videoCategory = $this->makeVideoCategory();
        $resp = $this->videoCategoryRepo->delete($videoCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(VideoCategory::find($videoCategory->id), 'VideoCategory should not exist in DB');
    }
}
