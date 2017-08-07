<?php
class PriceQoutePostTest extends PHPUnit_Framework_Testcase {

    private $post = null;

    public function __construct()
    {
        $this->post = new PriceQoutePost_model();
    }

    public function test_create_price_qoute_post() 
    {
        $phoneNumberKey = '555-555-5555';
        $table = 'priceQoutePosts';

        // first lets delete an instance of our dummy post if it exists because phone number is an unqiue key.
        $this->post->db->where('phone_number', $phoneNumberKey);
		$this->post->db->delete($table);

        // lets create our dummy post.
		$data = array(
			'blueprint_image' => 'postSlug.jpg',
			'description' => 'testing our PriceQoutePost_model',
			'email' => 'johnsmith@gmail.com',
			'name' => 'John Smith',
            'phone_number' => $phoneNumberKey
		);

        $result = $this->post->db->insert($table, $data);

        $this->assertTrue($result == 1);

    }

    public function test_get_price_qoutes()
    {
        $posts = $this->post->get_posts();
        $this->assertTrue(sizeof($posts) > 0);
    }

    public function test_get_price_qoute_by_phone_number()
    {
        $posts = $this->post->get_posts('555-555-5555');
        $this->assertTrue(sizeof($posts) > 0);
    }

    public function test_get_price_qoute_by_non_existing_phone_number()
    {
        $posts = $this->post->get_posts('666-555-5555');
        $this->assertTrue(sizeof($posts) == 0);
    }

    public function test_delete_by_phone_number()
    {
        $this->assertTrue($this->post->delete_post('555-555-5555'));
    }


}