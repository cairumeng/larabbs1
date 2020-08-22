<?php

namespace App\Observers;

use App\Models\Reply;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        $topic->body = clean($topic->body, 'user_topic_body');
        $topic->excerpt = make_excerpt($topic->body);
        $topic->slug = Str::slug($topic->title, '-');
    }

    public function saved(Topic $topic)
    {
        // dispatch(new TranslateSlug($topic));
    }

    public function deleted(Topic $topic)
    {
        Reply::where('topic_id', $topic->id)->delete();
    }
}
