<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;


class SitemapController extends AppController{

    //public $components = array('RequestHandler');

    public function initialize(){
        parent::initialize();
        //$this->viewBuilder()->layout('sitemap');                             
    }



    public function beforeFilter(Event $event){
        
        parent::beforeFilter($event);
        
        $this->Auth->allow(['index']);

    }

    public function index(){

        $sitemap_arr = array();
        $this->viewBuilder()->layout('sitemap');
        //$this->RequestHandler->renderAs($this, 'xml');
        $this->RequestHandler->respondAs('xml');
        
        // Лепим сайтмап
        $now_time = Time::now();
        $old_time = new Time('2017-01-10 11:11', 'America/New_York');

        $sitemap_arr[] = '<url>
                            <loc>https://'.$_SERVER['HTTP_HOST'].'</loc>
                            <lastmod>'.$now_time->i18nFormat('yyyy-MM-dd').'</lastmod>
                            <changefreq>weekly</changefreq>
                            <priority>1</priority>
                        </url>';
        

        

                            
/*        $articles_table = TableRegistry::get('Articles');
        $articles = $articles_table->getSitemapInformation();
        
        foreach($articles as $article){
            $sitemap_arr[] = '<url>
                                <loc>http://'.$_SERVER['HTTP_HOST'].DS.'articles'.DS.$article->alias.'</loc>
                                <lastmod>'.$article->modified->i18nFormat('yyyy-MM-dd').'</lastmod>
                                <changefreq>weekly</changefreq>
                                <priority>0.5</priority>
                            </url>';            
        }        


        $news_table = TableRegistry::get('News');
        $news = $news_table->getSitemapInformation();
        
        foreach($news as $new){
            $sitemap_arr[] = '<url>
                                <loc>http://'.$_SERVER['HTTP_HOST'].DS.'news'.DS.$new->alias.'</loc>
                                <lastmod>'.$new->modified->i18nFormat('yyyy-MM-dd').'</lastmod>
                                <changefreq>weekly</changefreq>
                                <priority>0.5</priority>
                            </url>';            
        }*/
         
        
        $pages_table = TableRegistry::get('Pages');
        $pages = $pages_table->getSitemapInformation();
        
        foreach($pages as $page){
            $sitemap_arr[] = '<url>
                                <loc>https://'.$_SERVER['HTTP_HOST'].DS.'pages'.DS.$page->alias.'</loc>
                                <lastmod>'.$page->modified->i18nFormat('yyyy-MM-dd').'</lastmod>
                                <changefreq>weekly</changefreq>
                                <priority>0.5</priority>
                            </url>';            
        }                
        
        $this->set(compact('sitemap_arr'));
        //$this->RequestHandler->respondAs('xml');


    }
    
}