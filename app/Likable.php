<?php
namespace App;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
trait Likable
{
    public function ScopeWithLikes(Builder $query){
        $query->leftJoinSub(
            'select twick_id, sum(liked) likesNumber, sum(!liked) dislikesNumber from likes group by twick_id',
            'likes',
            'likes.twick_id',
            'twicks.id'
        );
    }
    public function like($user = null,$liked = true){
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id
        ],[
            'liked'=> $liked
        ]);
    }

    public function dislike($user = null){
        return $this->like($user,false);
    }
    public function isLikedBy(User $user){
        return (bool)$user->likes->where('twick_id',$this->id)->where('liked',true)->count();
    }
    public function isDislikedBy(User $user){
        return (bool)$user->likes->where('twick_id',$this->id)->where('liked',false)->count();
    }
}
