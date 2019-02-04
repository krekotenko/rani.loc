<?php

use Illuminate\Database\Seeder;

class PagesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert(
            [
              [
                    'title' => 'Home Page',
                    'titleH1' => 'Home Page',
                    'description' => 'Home Page',
                    'text' => 'Home Page',
                    'alias' => 'home'
              ],
                [
                    'title' => 'About Page',
                    'titleH1' => 'About Page',
                    'description' => 'About Page',
                    'text' => 'About Page',
                    'alias' => 'about'
                ],
                [
                    'title' => 'Transformations Page',
                    'titleH1' => 'Transformations Page',
                    'description' => 'Transformations Page',
                    'text' => 'Transformations Page',
                    'alias' => 'transformations'
                ],
                [
                    'title' => 'Take the quiz',
                    'titleH1' => 'Take the quiz',
                    'description' => 'Ready to make a change? I’ll help you break through the problems that you\'ve struggled with over and over again, so you can finally be free.',
                    'text' => 'Take the quiz',
                    'alias' => 'quiz'
                ],
                [
                    'title' => 'The Ultimate Decision-Making Tool',
                    'titleH1' => 'The Ultimate Decision-Making Tool',
                    'description' => 'The Ultimate Decision-Making Tool',
                    'text' => 'The Ultimate Decision-Making Tool',
                    'alias' => 'ultimate-decision'
                ],
                [
                    'title' => 'Contact Page',
                    'titleH1' => 'Contact Page',
                    'description' => 'Contact Page',
                    'text' => 'Contact Page',
                    'alias' => 'contact'
                ],
                [
                    'title' => 'Privacy Policy. Page',
                    'titleH1' => 'Privacy Policy. Page',
                    'description' => 'Privacy Policy. Page',
                    'text' => 'Privacy Policy. Page',
                    'alias' => 'privacy-policy'
                ],
                [
                    'title' => 'Terms & Conditions. Page',
                    'titleH1' => 'Terms & Conditions. Page',
                    'description' => 'Terms & Conditions. Page',
                    'text' => 'Terms & Conditions. Page',
                    'alias' => 'terms-and-conditions'
                ],
                [
                    'title' => 'Can I be hypnotized?',
                    'titleH1' => 'Can I be hypnotized?',
                    'description' => 'Find out now in less than 2 minutes.',
                    'text' => 'Can I be hypnotized?',
                    'alias' => 'quiz-step-two'
                ],
                [
                    'title' => 'Free 30 minutes session',
                    'titleH1' => 'Free 30 minutes session',
                    'description' => 'Free 30 minutes session',
                    'text' => 'Free 30 minutes session',
                    'alias' => 'free-30-minutes'
                ],
                [
                    'title' => 'Get started',
                    'titleH1' => 'Get started',
                    'description' => 'Get started',
                    'text' => 'Get started',
                    'alias' => 'get-started'
                ],
                [
                    'title' => 'Giving Back',
                    'titleH1' => 'Giving Back',
                    'description' => 'Giving Back',
                    'text' => 'Giving Back',
                    'alias' => 'giving-back'
                ],
                [
                    'title' => 'Rapid Transformation',
                    'titleH1' => 'Rapid Transformation',
                    'description' => 'Rapid Transformation',
                    'text' => 'By targeting the root cause of your problem in hypnosis, I’ll help you overcome issues that you thought could never be fixed. Be HEALED now.',
                    'alias' => 'rapid-transformation'
                ],
                [
                    'title' => 'Client stories',
                    'titleH1' => 'Client stories',
                    'description' => 'Client stories',
                    'text' => 'Client stories.',
                    'alias' => 'client-stories'
                ],
                [
                    'title' => 'Blog',
                    'titleH1' => 'Blog',
                    'description' => 'Blog',
                    'text' => 'Blog',
                    'alias' => 'blog'
                ],
            ]
        );
    }
}
