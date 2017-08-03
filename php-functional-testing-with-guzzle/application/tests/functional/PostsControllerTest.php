<?php
use GuzzleHttp\Client;
class PostsControllerTest extends PHPUnit_Framework_Testcase {


    //This var is needed because SERVER[] variables are within php unit here.
    private $epsweldingservices = 'http://localhost/epsweldingservices/'; 
    private $client = null;
    private $post = null;

    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/epsweldingservices/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $this->post = new Post_model();
    }
    /**************************************************************************
     *                          TEST FUNCTIONS                                *
     **************************************************************************/
    public function test_all_get_routes_status_200() 
    {
        //our slug used in our routes for posts/view/ and pages/view/
        $slug = 'How-to-use-phpUnit-and-guzzle-with-Codeigniter';

        // lets create our dummy post.
		$data = array(
			'title' => 'How to use phpUnit and guzzle with Codeigniter',
			'slug' => $slug,
			'body' => 'Go to this website: <a href="https://github.com/fmalk/codeigniter-phpunit/blob/master/README.md">here</a>',
			'category_id' => 1,
			'post_image' => "postSlug.jpg"
		);
        // insert to db
        $this->post->db->insert('posts', $data);

        //all of the GET routes to be tested
        $routes = ['', 'home', 'posts', 'posts/create', 'posts/edit/'.$slug, 'posts/rules', 'posts/view/'.$slug, 'pages/view/'];

        // for each route confirm we have get response status code 200
        foreach ( $routes as $route ) 
        {
            $status_code = $this->get_route_for_status_200($route);
            $this->assertEquals( $status_code, '200' );
        }


        //clean up our db
        $this->post->db->where('slug', 'How-to-use-phpUnit-and-guzzle-with-Codeigniter');
		$this->post->db->delete('posts');
        
    }

    public function test_create_post_route_for_status_200()
    {
        $response = $this->client->request('POST', $epsweldingservices.'posts/create', [
            'multipart' => [
                [
                    'name'     => 'title',
                    'contents' => 'test create post route for status 200'
                ],
                [
                    'name'     => 'body',
                    'contents' => file_get_contents(__DIR__.'\\logs\\body_content.txt', 'r')
                ],
                [
                    'name'     => 'category_id',
                    'contents' => '1'
                ],
                [
                    'name'     => 'userfile',
                    'contents' => file_get_contents(__DIR__.'\\logs\\test.jpg', 'r'),
                    'filename' => 'test.jpg'
                ]
            ]
        ]);
        $string_body = $response->getBody();
        $this->log('string_body.txt', $string_body);
        $this->assertEquals( $response->getStatusCode(), '200' );
        //getUri()->__toString()

        //clean up our db and assets/images folder
        $this->post->db->select('id');
        $this->post->db->where('slug', 'test-create-post-route-for-status-200');
        $q = $this->post->db->get('posts');
        $data = $q->result_array();
        $id = $data[0]['id'];
        $this->log('id.txt', $id); // logging the id to make sure its working when it changes by incrementing
        $this->post->delete_post($id);
    }



    /**************************************************************************
     *                  UTILITY FUNCTIONS FOR TEST FUNCTIONS                  *
     **************************************************************************/

    
    private function log( $filename = 'default.txt', $response ) 
    {
        $myfile = fopen(__DIR__."\\logs\\".$filename, "w") or die("Unable to open file!");
        fwrite($myfile, $response);
        fclose($myfile);
    }


    private function get_route_for_status_200 ( $route )
    {
        $response = $this->client->request('GET', $route);
        $status_code = $response->getStatusCode();
        //$this->log('test_guzzle_get_home_with_param_home.txt', $status_code);
        return $status_code;
    }

}