<?php

namespace app\models;

class Post
{
    public function getAllPosts() {
        return [
            [
                'id' => '1',
                'name' => 'pinecone',
                'content' => 'I am a cat'
            ],
            [
                'id' => '2',
                'name' => 'nathan',
                'content' => 'I am a human'
            ]
        ];
    }
}