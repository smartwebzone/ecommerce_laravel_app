<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVideoCategoryAPIRequest;
use App\Http\Requests\API\UpdateVideoCategoryAPIRequest;
use App\Models\VideoCategory;
use App\Repositories\VideoCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VideoCategoryController
 * @package App\Http\Controllers\API
 */

class VideoCategoryAPIController extends AppBaseController
{
    /** @var  VideoCategoryRepository */
    private $videoCategoryRepository;

    public function __construct(VideoCategoryRepository $videoCategoryRepo)
    {
        $this->videoCategoryRepository = $videoCategoryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/videoCategories",
     *      summary="Get a listing of the VideoCategories.",
     *      tags={"VideoCategory"},
     *      description="Get all VideoCategories",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/VideoCategory")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->videoCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->videoCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $videoCategories = $this->videoCategoryRepository->all();

        return $this->sendResponse($videoCategories->toArray(), 'Video Categories retrieved successfully');
    }

    /**
     * @param CreateVideoCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/videoCategories",
     *      summary="Store a newly created VideoCategory in storage",
     *      tags={"VideoCategory"},
     *      description="Store VideoCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="VideoCategory that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/VideoCategory")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/VideoCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateVideoCategoryAPIRequest $request)
    {
        $input = $request->all();

        $videoCategories = $this->videoCategoryRepository->create($input);

        return $this->sendResponse($videoCategories->toArray(), 'Video Category saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/videoCategories/{id}",
     *      summary="Display the specified VideoCategory",
     *      tags={"VideoCategory"},
     *      description="Get VideoCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of VideoCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/VideoCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var VideoCategory $videoCategory */
        $videoCategory = $this->videoCategoryRepository->findWithoutFail($id);

        if (empty($videoCategory)) {
            return $this->sendError('Video Category not found');
        }

        return $this->sendResponse($videoCategory->toArray(), 'Video Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateVideoCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/videoCategories/{id}",
     *      summary="Update the specified VideoCategory in storage",
     *      tags={"VideoCategory"},
     *      description="Update VideoCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of VideoCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="VideoCategory that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/VideoCategory")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/VideoCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateVideoCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var VideoCategory $videoCategory */
        $videoCategory = $this->videoCategoryRepository->findWithoutFail($id);

        if (empty($videoCategory)) {
            return $this->sendError('Video Category not found');
        }

        $videoCategory = $this->videoCategoryRepository->update($input, $id);

        return $this->sendResponse($videoCategory->toArray(), 'VideoCategory updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/videoCategories/{id}",
     *      summary="Remove the specified VideoCategory from storage",
     *      tags={"VideoCategory"},
     *      description="Delete VideoCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of VideoCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var VideoCategory $videoCategory */
        $videoCategory = $this->videoCategoryRepository->findWithoutFail($id);

        if (empty($videoCategory)) {
            return $this->sendError('Video Category not found');
        }

        $videoCategory->delete();

        return $this->sendResponse($id, 'Video Category deleted successfully');
    }
}
