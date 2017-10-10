<?php

namespace App\Scopes;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;

trait RateReview
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'reviewrateable');
    }

    /**
     *
     * @return mix
     */
    public function averageRating($round= null)
    {
      if ($round) {
            return $this->ratings()
              ->selectRaw('ROUND(AVG(rating), '.$round.') as averageRateReview')
              ->pluck('averageRateReview');
        }

        return $this->ratings()
            ->selectRaw('AVG(rating) as averageRateReview')
            ->pluck('averageRateReview');
    }

    /**
     *
     * @return mix
     */
    public function countRating(){
      return $this->ratings()
          ->selectRaw('count(rating) as countRateReview')
          ->pluck('countRateReview');
    }

    /**
     *
     * @return mix
     */
    public function sumRating()
    {
        return $this->ratings()
            ->selectRaw('SUM(rating) as sumRateReview')
            ->pluck('sumRateReview');
    }

    /**
     * @param $max
     *
     * @return mix
     */
    public function ratingPercent($max = 5)
    {
        $ratings = $this->ratings();
        $quantity = $ratings->count();
        $total = $ratings->selectRaw('SUM(rating) as total')->pluck('total');
        return ($quantity * $max) > 0 ? $total / (($quantity * $max) / 100) : 0;
    }

    /**
     * @param $data
     * @param Model      $author
     * @param Model|null $parent
     *
     * @return static
     */
    public function rating($data, Model $author, Model $parent = null)
    {
        return (new Rating())->createRating($this, $data, $author);
    }

    /**
     * @param $id
     * @param $data
     * @param Model|null $parent
     *
     * @return mixed
     */
    public function updateRating($id, $data, Model $parent = null)
    {
        return (new Rating())->updateRating($id, $data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteRating($id)
    {
        return (new Rating())->deleteRating($id);
    }
}
