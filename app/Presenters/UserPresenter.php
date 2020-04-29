<?php

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    public function cpfFormat()
    {
        // return $this->created_at->diffForHumans();
        return '???';
    }

}
