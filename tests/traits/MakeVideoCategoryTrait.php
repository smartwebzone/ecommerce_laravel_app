<?php

use Faker\Factory as Faker;
use App\Models\VideoCategory;
use App\Repositories\VideoCategoryRepository;

trait MakeVideoCategoryTrait
{
    /**
     * Create fake instance of VideoCategory and save it in database
     *
     * @param array $videoCategoryFields
     * @return VideoCategory
     */
    public function makeVideoCategory($videoCategoryFields = [])
    {
        /** @var VideoCategoryRepository $videoCategoryRepo */
        $videoCategoryRepo = App::make(VideoCategoryRepository::class);
        $theme = $this->fakeVideoCategoryData($videoCategoryFields);
        return $videoCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of VideoCategory
     *
     * @param array $videoCategoryFields
     * @return VideoCategory
     */
    public function fakeVideoCategory($videoCategoryFields = [])
    {
        return new VideoCategory($this->fakeVideoCategoryData($videoCategoryFields));
    }

    /**
     * Get fake data of VideoCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVideoCategoryData($videoCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'video_id' => $fake->randomDigitNotNull,
            'meta_description' => $fake->text,
            'banner' => $fake->word,
            'slug' => $fake->word,
            'lang' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $videoCategoryFields);
    }
}
