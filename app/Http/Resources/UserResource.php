<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            // Add other fields you want to include
            'teachers' => TeacherResource::collection($this->teachers),
            'students' => StudentResource::collection($this->students),
            'subscriptions' => SubscriptionResource::collection($this->subscriptions),
            'wallets' => WalletResource::collection($this->wallets),
            'transactions' => TransactionResource::collection($this->transactions),
            'parentes' => ParenteResource::collection($this->parentes),
            'articles' => ArticleResource::collection($this->articles),
        ];
    }
}
