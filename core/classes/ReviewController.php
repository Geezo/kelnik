<?php
namespace Reviews;
use Reviews\ReviewRepository;

class ReviewController
{
    /**
     * @var reviewRepository
     */
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * @param int $limit
     * @return array
     */
    public function getReviews($limit = 5):array
    {
        $result = [];
        $result = $this->reviewRepository->get($limit);

        return $result;
    }

    /**
     * @param string $email
     * @param string $name
     * @param string $message
     * @return bool
     */
    public function addReview($email, $name, $message):bool
    {
        $result = [];
        $result = $this->reviewRepository->add($email, $name, $message);

        return $result;
    }
}
