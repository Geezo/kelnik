<?php
namespace Reviews;

class ReviewValidator
{

    public function __construct()
    {
    }

    public function validateEmail($email): bool
    {
        $result = [];
        $result = $this->reviewRepository->get($limit);

        return $result;
    }
}
