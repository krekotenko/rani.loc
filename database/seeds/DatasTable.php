<?php

use Illuminate\Database\Seeder;

class DatasTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datas')->insert(
            [
/*
               [
                    'page_id' => '1',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_1',
                    'title' => 'Url link 1',
                    'additional' => null
                ],
                [
                    'page_id' => '1',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_1',
                    'title' => 'Link Image 1',
                    'additional' => null
                ],
                [
                    'page_id' => '1',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_1',
                    'title' => 'Image 1',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '1',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_2',
                    'title' => 'Url link 2',
                    'additional' => null
                ],
                [
                    'page_id' => '1',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_2',
                    'title' => 'Link Image 2',
                    'additional' => null
                ],
                [
                    'page_id' => '1',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_2',
                    'title' => 'Image 2',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '1',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_3',
                    'title' => 'Url link 3',
                    'additional' => null
                ],
                [
                    'page_id' => '1',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_3',
                    'title' => 'Link Image 3',
                    'additional' => null
                ],
                [
                    'page_id' => '1',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_3',
                    'title' => 'Image 3',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '7',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'banner_image',
                    'title' => 'Banner Image',
                    'additional' => '1440,697'
                ],
                [
                    'page_id' => '8',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'banner_image',
                    'title' => 'Banner Image',
                    'additional' => '1440,697'
                ],
                [
                    'page_id' => '10',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'banner_image',
                    'title' => 'Banner Image',
                    'additional' => '1440,602'
                ],*/
                /*[
                    'page_id' => '11',
                    'field_id' => '1',
                    'value' => 'https://youtu.be/HNjqJ4oVptk',
                    'alias' => 'video_url',
                    'title' => 'Video Url',
                    'additional' => null
                ],
                [
                    'page_id' => '11',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_1',
                    'title' => 'Url link 1',
                    'additional' => null
                ],
                [
                    'page_id' => '11',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_1',
                    'title' => 'Link Image 1',
                    'additional' => null
                ],
                [
                    'page_id' => '11',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_1',
                    'title' => 'Image 1',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '11',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_2',
                    'title' => 'Url link 2',
                    'additional' => null
                ],
                [
                    'page_id' => '11',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_2',
                    'title' => 'Link Image 2',
                    'additional' => null
                ],
                [
                    'page_id' => '11',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_2',
                    'title' => 'Image 2',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '11',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_3',
                    'title' => 'Url link 3',
                    'additional' => null
                ],
                [
                    'page_id' => '11',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_3',
                    'title' => 'Link Image 3',
                    'additional' => null
                ],
                [
                    'page_id' => '11',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_3',
                    'title' => 'Image 3',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '12',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_1',
                    'title' => 'Url link 1',
                    'additional' => null
                ],
                [
                    'page_id' => '12',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_1',
                    'title' => 'Link Image 1',
                    'additional' => null
                ],
                [
                    'page_id' => '12',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_1',
                    'title' => 'Image 1',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '12',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_2',
                    'title' => 'Url link 2',
                    'additional' => null
                ],
                [
                    'page_id' => '12',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_2',
                    'title' => 'Link Image 2',
                    'additional' => null
                ],
                [
                    'page_id' => '12',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_2',
                    'title' => 'Image 2',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '12',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'banner_image',
                    'title' => 'Banner Image',
                    'additional' => '1440,697'
                ],
                [
                    'page_id' => '12',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_3',
                    'title' => 'Url link 3',
                    'additional' => null
                ],
                [
                    'page_id' => '12',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_3',
                    'title' => 'Link Image 3',
                    'additional' => null
                ],
                [
                    'page_id' => '12',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_3',
                    'title' => 'Image 3',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '13',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'banner_image',
                    'title' => 'Banner Image',
                    'additional' => '1440,697'
                ],
                [
                    'page_id' => '13',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_1',
                    'title' => 'Url link 1',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_1',
                    'title' => 'Link Image 1',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_1',
                    'title' => 'Image 1',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '13',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_2',
                    'title' => 'Url link 2',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_2',
                    'title' => 'Link Image 2',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_2',
                    'title' => 'Image 2',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '13',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_3',
                    'title' => 'Url link 3',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_3',
                    'title' => 'Link Image 3',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_3',
                    'title' => 'Image 3',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '13',
                    'field_id' => '9',
                    'value' => '',
                    'alias' => 'said_lines',
                    'title' => 'Said Lines',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '9',
                    'value' => '',
                    'alias' => 'said_lines',
                    'title' => 'Have you ever said',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '2',
                    'value' => '',
                    'alias' => 'text_1',
                    'title' => 'Text 1',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '2',
                    'value' => '',
                    'alias' => 'text_2',
                    'title' => 'Text 2',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '2',
                    'value' => '',
                    'alias' => 'text_3',
                    'title' => 'Text 3',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '9',
                    'value' => '',
                    'alias' => 'what_you_get',
                    'title' => 'What you\'ll get',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '2',
                    'value' => '',
                    'alias' => 'how_it_works_1',
                    'title' => 'How it works(text1)',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '2',
                    'value' => '',
                    'alias' => 'how_it_works_2',
                    'title' => 'How it works(text2)',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '2',
                    'value' => '',
                    'alias' => 'how_it_works_3',
                    'title' => 'How it works(text3)',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '2',
                    'value' => '',
                    'alias' => 'how_it_works_4',
                    'title' => 'How it works(text4)',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '1',
                    'value' => '',
                    'alias' => 'change_thoughts',
                    'title' => 'Change thoughts text ',
                    'additional' => null
                ],
                [
                    'page_id' => '13',
                    'field_id' => '9',
                    'value' => '',
                    'alias' => 'slider_text',
                    'title' => 'Slider texts',
                    'additional' => null
                ],*/
                [
                    'page_id' => '14',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'audio_file',
                    'title' => 'Audio File',
                    'additional' => null
                ],
                [
                    'page_id' => '14',
                    'field_id' => '1',
                    'value' => 'Free from pain',
                    'alias' => 'audio_title',
                    'title' => 'Audio title',
                    'additional' => null
                ],
                [
                    'page_id' => '14',
                    'field_id' => '2',
                    'value' => 'Thank you Rani for giving me wonderful relief from my migraine with aura',
                    'alias' => 'audio_description',
                    'title' => 'Audio description',
                    'additional' => null
                ],
                [
                    'page_id' => '14',
                    'field_id' => '1',
                    'value' => 'Donna Harris, Spa therapist, Australia',
                    'alias' => 'audio_author',
                    'title' => 'Audio author',
                    'additional' => null
                ],
                [
                    'page_id' => '14',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_1',
                    'title' => 'Url link 1',
                    'additional' => null
                ],
                [
                    'page_id' => '14',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_1',
                    'title' => 'Link Image 1',
                    'additional' => null
                ],
                [
                    'page_id' => '14',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_1',
                    'title' => 'Image 1',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '14',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_2',
                    'title' => 'Url link 2',
                    'additional' => null
                ],
                [
                    'page_id' => '14',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_2',
                    'title' => 'Link Image 2',
                    'additional' => null
                ],
                [
                    'page_id' => '14',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_2',
                    'title' => 'Image 2',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '14',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_3',
                    'title' => 'Url link 3',
                    'additional' => null
                ],
                [
                    'page_id' => '14',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_3',
                    'title' => 'Link Image 3',
                    'additional' => null
                ],
                [
                    'page_id' => '14',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_3',
                    'title' => 'Image 3',
                    'additional' => '480,560'
                ],

                /*[
                    'page_id' => '2',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_1',
                    'title' => 'Url link 1',
                    'additional' => null
                ],
                [
                    'page_id' => '2',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_1',
                    'title' => 'Link Image 1',
                    'additional' => null
                ],
                [
                    'page_id' => '2',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_1',
                    'title' => 'Image 1',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '2',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_2',
                    'title' => 'Url link 2',
                    'additional' => null
                ],
                [
                    'page_id' => '2',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_2',
                    'title' => 'Link Image 2',
                    'additional' => null
                ],
                [
                    'page_id' => '2',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_2',
                    'title' => 'Image 2',
                    'additional' => '480,560'
                ],
                [
                    'page_id' => '2',
                    'field_id' => '1',
                    'value' => '/',
                    'alias' => 'url_page_3',
                    'title' => 'Url link 3',
                    'additional' => null
                ],
                [
                    'page_id' => '2',
                    'field_id' => '1',
                    'value' => 'get started',
                    'alias' => 'link_image_3',
                    'title' => 'Link Image 3',
                    'additional' => null
                ],
                [
                    'page_id' => '2',
                    'field_id' => '7',
                    'value' => '-',
                    'alias' => 'path_image_3',
                    'title' => 'Image 3',
                    'additional' => '480,560'
                ],*/

            ]
        );
    }
}
