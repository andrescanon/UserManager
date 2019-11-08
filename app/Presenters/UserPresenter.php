<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{

    public function actions()
    {
        return view('template::users.columns.actions')
                    ->withUser($this->entity)->render();
    }

    public function role()
    {
        return view('template::users.columns.role',
            ['name' => $this->entity->role->name])->render();
    }

    public function humans_created_at()
    {
        return $this->created_at->diffForHumans();
    }

    public function humans_updated_at()
    {
        return $this->updated_at->diffForHumans();
    }


}
