<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;
class PostTableSeeeder extends Seeder{

	public function run(){
		Post::create(
			[
				'id_usuario'=>'1',
				'title'=>'Mi Primer Post',
				'content'=>'unique
							This is a boolean defining whether slugs should be unique among all models of the given type. For example, if you have two blog posts and both are called "My Blog Post", then they will both sluggify to "my-blog-post" (when using Sluggables default settings This could be a problem, e.g. if you use the slug in URLs.
							By turning unique on, then the second Post model will sluggify to "my-blog-post-1". If there is a third post with the same title, it will sluggify to "my-blog-post-2" and so on. Each subsequent model will get an incremental value appended to the end of the slug, ensuring uniqueness.include_trashed	Setting this to true will also check deleted models when trying to enforce uniqueness. This only affects Eloquent models that are using the softDelete feature. Default is false, so soft-deleted models dont count when checking for uniqueness.
							on_update A boolean. If it is false (the default value), then slugs will not be updated if a model is resaved (e.g. if you change the title of your blog post, the slug will remain the same) or the slug value has already been set. You can set it to true (or manually change the $model->slug value in your own code) if you want to override this behaviour.
							(If you want to manually set the slug value using your models Sluggable settings, you can run $model->resluggify() to force Sluggable to update the slug field.)
							reserved An array of values that will never be allowed as slugs, e.g. to prevent collisions with existing routes or controller methods, etc.. This can be an array, or a closure that returns an array. Defaults to null: no reserved slug names.',
				'tags' => 'laravel,blog,ccbol,2015,en,proceso',
				'photo'=>'1443733967040d6417.jpg'
			]
			);
		Post::create(
			[
				'id_usuario'=>'2',
				'title'=>'Mi segundo Post',
				'content'=>'unique
							This is a boolean defining whether slugs should be unique among all models of the given type. For example, if you have two blog posts and both are called "My Blog Post", then they will both sluggify to "my-blog-post" (when using Sluggables default settings This could be a problem, e.g. if you use the slug in URLs.
							By turning unique on, then the second Post model will sluggify to "my-blog-post-1". If there is a third post with the same title, it will sluggify to "my-blog-post-2" and so on. Each subsequent model will get an incremental value appended to the end of the slug, ensuring uniqueness.include_trashed	Setting this to true will also check deleted models when trying to enforce uniqueness. This only affects Eloquent models that are using the softDelete feature. Default is false, so soft-deleted models dont count when checking for uniqueness.
							on_update A boolean. If it is false (the default value), then slugs will not be updated if a model is resaved (e.g. if you change the title of your blog post, the slug will remain the same) or the slug value has already been set. You can set it to true (or manually change the $model->slug value in your own code) if you want to override this behaviour.
							(If you want to manually set the slug value using your models Sluggable settings, you can run $model->resluggify() to force Sluggable to update the slug field.)
							reserved An array of values that will never be allowed as slugs, e.g. to prevent collisions with existing routes or controller methods, etc.. This can be an array, or a closure that returns an array. Defaults to null: no reserved slug names.',
				'tags' => 'laravel,blog,ccbol,2015',
				'photo'=>'1443558639300px-Red_Blade_Liger.jpg'
			]
			);
	}
}
