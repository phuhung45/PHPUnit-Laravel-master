<?php

function createPost($attributes = [])
{
    return factory(Post::class)->create($attributes);
}
