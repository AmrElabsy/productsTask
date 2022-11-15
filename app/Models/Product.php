<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Product extends Model
{
    use HasFactory;

	public function category() {
		return $this->belongsTo(Category::class);
	}
	/**
	 * @Note: As a better Solution, this method should not be implemented in this
	 * concrete class. Regarding the Scalability, there should be other resources
	 * that have images for their own, and this requires some duplication in code.
	 *
	 * The preferred solution is to use a Trait that so-called "Uploadable" and has
	 * a method called "uploadImage". It should contain different parameters list
	 * than this method, because it would be polymorphic method.
	 *
	 * But, as it is just a task, let's KISS.
	 */
	public function uploadImage($image) {
		$path = 'uploads/products';

		$name = time() . '.' . $image->getClientOriginalExtension();
		if ( !Storage::exists($path) ) {
			Storage::disk('public')->makeDirectory($path);
		}

		$image = Image::make($image->getRealPath());
		$image->save(storage_path('app/public/' . $path . '/' . $name));

		$this->image = $path . "/" . $name;
	}
}
