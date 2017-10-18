<?php

use Faker\Factory as Faker;
use App\Models\Event;
use App\Repositories\EventRepository;

trait MakeEventTrait
{
    /**
     * Create fake instance of Event and save it in database
     *
     * @param array $eventFields
     * @return Event
     */
    public function makeEvent($eventFields = [])
    {
        /** @var EventRepository $eventRepo */
        $eventRepo = App::make(EventRepository::class);
        $theme = $this->fakeEventData($eventFields);
        return $eventRepo->create($theme);
    }

    /**
     * Get fake instance of Event
     *
     * @param array $eventFields
     * @return Event
     */
    public function fakeEvent($eventFields = [])
    {
        return new Event($this->fakeEventData($eventFields));
    }

    /**
     * Get fake data of Event
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEventData($eventFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'slug' => $fake->word,
            'ticket_vendor_id' => $fake->word,
            'ticket_vendor' => $fake->word,
            'venue' => $fake->word,
            'starts' => $fake->date('Y-m-d H:i:s'),
            'start_time' => $fake->date('Y-m-d H:i:s'),
            'ends' => $fake->date('Y-m-d H:i:s'),
            'end_time' => $fake->date('Y-m-d H:i:s'),
            'text_date' => $fake->word,
            'event_image' => $fake->word,
            'event_image_alt' => $fake->word,
            'video_url' => $fake->word,
            'video_id' => $fake->word,
            'summary' => $fake->text,
            'content' => $fake->text,
            'link_text' => $fake->word,
            'link_url' => $fake->word,
            'map_zoom' => $fake->word,
            'latitude' => $fake->randomDigitNotNull,
            'longitude' => $fake->randomDigitNotNull,
            'marker_title' => $fake->word,
            'is_sticky' => $fake->word,
            'in_rss' => $fake->word,
            'is_repeating' => $fake->word,
            'meta_description' => $fake->text,
            'meta_keywords' => $fake->text,
            'status' => $fake->word,
            'published_date' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s')
        ], $eventFields);
    }
}
