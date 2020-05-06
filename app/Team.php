<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable=['name','size'];

    public function add($users)
    {
        $this->guardAgainstTooManyMembers($this->extractNewUsersCount($users));

        $method=$users instanceof User ? 'save' : 'saveMany';

        $this->members()->$method($users);
    }

    public function remove($users = null)
    {
        if($users instanceof User)
        {
            return $users->LeaveTeam();
        }

        return $this->removeMany($users);
    }

    public function removeMany($users)
    {
        return $this->members()->whereIn('id',$users->pluck('id'))->update(['team_id'=>null]);
    }

    public function restart()
    {
        return $this->members()->update(['team_id'=>null]);
    }

    public function members()
    {
        return $this->hasMary(User::class);
    }

    public function count()
    {
        return $this->members()->count();
    }

    public function maximumSize()
    {
        return $this->size;
    }

    protected function guardAgainstTooManyMembers($newUsersCount)
    {

        $newTeamCount=$this->count()+$newUsersCount;

        if($newTeamCount > $this->maximumSize()){
            throw new \Exception;
        }
    }

    protected function extractNewUsersCount($users)
    {
        return($users instanceof User) ? 1 : count($users);
    }
}
