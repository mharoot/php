<?php
class PostTest extends PHPUnit_Framework_Testcase {
    public function test_get_post_with_no_parameter_returns_all_posts()
    {
        $post = new Post_model();
        $posts = $post->get_posts();
        $this->assertTrue(sizeof($posts) > 0);
    }

    public function test_get_post_with_parameter_that_does_not_exist_returns_zero_posts()
    {
        $post = new Post_model();
        $posts = $post->get_posts('this-slug-does-not-exist');
        $this->assertTrue(sizeof($posts) == 0);
    }

    public function test_get_post_with_existing_parameter_returns_1_post() 
    {
        $post = new Post_model();
        $posts = $post->get_posts('What-Is-MVC');
        $this->assertTrue(sizeof($posts) > 0);
    }

    public function test_create_post() 
    {
        $post = new Post_model();

        // first lets delete all instances of our dummy post.
        $post->db->where('slug', 'How-to-use-phpUnit-with-Codeigniter');
		$post->db->delete('posts');

        // lets create our dummy post.
		$data = array(
			'title' => 'How to use phpUnit with Codeigniter',
			'slug' => 'How-to-use-phpUnit-with-Codeigniter',
			'body' => 'Go to this website: <a href="https://github.com/fmalk/codeigniter-phpunit/blob/master/README.md">here</a>',
			'category_id' => 1,
			'post_image' => "postSlug.jpg"
		);

        $result = $post->db->insert('posts', $data);
        
        $myfile = fopen(__DIR__."\\logs\\test_create_post_log.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $result);
        fclose($myfile);


        $this->assertTrue($result == 1);

    }


    public function test_delete_post()
    {
        $post = new Post_model();

        // first lets delete all instances of our dummy post.
        $post->db->where('slug', 'How-to-use-phpUnit-with-Codeigniter');
		$post->db->delete('posts');

        // lets create our dummy post.
		$data = array(
			'title' => 'How to use phpUnit with Codeigniter',
			'slug' => 'How-to-use-phpUnit-with-Codeigniter',
			'body' => 'Go to this website: <a href="https://github.com/fmalk/codeigniter-phpunit/blob/master/README.md">here</a>',
			'category_id' => 1,
			'post_image' => "postSlug.jpg"
		);

        $id = $post->db->insert_id('posts', $data);
        
        $this->assertTrue($post->delete_post($id));
        
    }
}