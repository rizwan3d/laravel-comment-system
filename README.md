**Rizwan3d/CommentSystem**

This Laravel package provides a robust and flexible comment system for your applications. It enables you to seamlessly integrate commenting functionality into your models, allowing users to engage in discussions and leave feedback.

**Installation**

1. **Add the package to your project's `composer.json` file:**

   ```json
   "require": {
       "rizwan3d/comment-system": "^1.0"
   }
   ```

2. **Run Composer to install the package:**

   ```bash
   composer update
   ```

3. **Register the service provider:**

   Open your `config/app.php` file and add the following line to the `providers` array:

   ```php
   Rizwan3d\CommentSystem\Providers\CommentSystemServiceProvider::class,
   ```

**Usage**

1. **Apply the `Commentable` trait to your models:**

   The `Commentable` trait provides methods for adding and retrieving comments associated with your models. Add the following line at the top of your model class:

   ```php
   use Rizwan3d\CommentSystem\Traits\Commentable;
   ```

2. **Adding Comments:**

   Use the `addComment` method to add a new comment to your model instance:

   ```php
   $model->addComment($content);
   ```

   - Replace `$content` with the actual comment text.

3. **Retrieving Comments:**

   The `comments` method returns a collection of comments associated with your model instance:

   ```php
   $comments = $model->comments;
   ```

   This method automatically retrieves comments with nested replies using eager loading.

4. **Model Relationships (Optional):**

   The package supports defining relationships between comments. You can add the `parent_id` field to your `Comment` model migration and define the following relationships:

   - `parent`: This belongs-to relationship allows you to link comments to their parent comment.
   - `comments`: This has-many relationship retrieves child comments of a specific comment.

**Example Usage**

```php
use App\Post; // Replace with your model class

$post = Post::find(1);

$comment = $post->addComment('This post is great!');

$childComment = $comment->addComment('I agree!');

$allComments = $post->comments; // Includes $comment and $childComment
```

**Features**

- Integrates seamlessly with your Laravel models.
- Allows users to add comments to any model.
- Supports nested replies (optional).
- Provides methods for adding, retrieving, and managing comments.

**View Example**

### comment.blade.php
```php
<ol>
    @foreach ($comments as $comment)
    <li>{{$comment->content}}</li>
    @include('comment',['comments' => $comment->comments])
    @endforeach
</ol>
```

**Contributing**

We welcome contributions to this package! Please refer to the contribution guidelines for more information.

**License**

This package is licensed under the MIT License. See the `LICENSE` file for details.

**Additional Notes**

- Consider adding comments and explanations within the code for better readability.
- Feel free to extend the functionality of this package based on your specific requirements.
