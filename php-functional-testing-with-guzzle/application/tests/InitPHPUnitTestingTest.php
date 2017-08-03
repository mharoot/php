<?php
/*
@name:  InitPHPUnitTestingTest.php
@task:  To ensure there is only one instance of these requirements below so that php 
        does not throw an error at us during testing.  This way we do not need to keep requiring
        these statements in our testing files.  
@note:  The naming convention must remain contain Test at the end just as all the other tests.
*/
$epsweldingservices = $_SERVER['DOCUMENT_ROOT'];


require_once ( 'PHPUnit/Framework/TestCase.php' ); // throws error if required more than one time within the tests directory.

require_once ( 'PHPUnit/Autoload.php' );           // throws error if it was not for this file.

require_once( $epsweldingservices.'vendor/autoload.php' );  // enables us to use guzzle

require_once( $epsweldingservices.'application/models/Post_model.php' ); // enables us to use one of our models



class InitPHPUnitTestingTest extends PHPUnit_Framework_Testcase 
{
    public function test_all_requirements_have_been_init_for_testing() 
    {
        $this->assertTrue(true);
    }
}
