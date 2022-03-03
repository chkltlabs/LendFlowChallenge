<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class NYTApiTest extends TestCase
{
    private $jsonStructure;
    protected function setUp(): void
    {
        parent::setUp();
        $this->jsonStructure = [
            "status",
            "copyright",
            "num_results",
            "results" => [
                [
                    "title",
                    "description",
                    "contributor",
                    "author",
                    "contributor_note",
                    "price",
                    "age_group",
                    "publisher",
                    "isbns" => [
                        [
                            "isbn10",
                            "isbn13",
                        ],
                    ],
                    "ranks_history" => [
                        [
                            "primary_isbn10",
                            "primary_isbn13",
                            "rank",
                            "list_name",
                            "display_name",
                            "published_date",
                            "bestsellers_date",
                            "weeks_on_list",
                            "rank_last_week",
                            "asterisk",
                            "dagger",
                        ],
                    ],
                    "reviews" => [
                        [
                            "book_review_link",
                            "first_chapter_link",
                            "sunday_review_link",
                            "article_chapter_link",
                        ],
                    ],
                ],
            ],
        ];
        Http::fake([
            env('NYT_API_URL', 'https://www.google.com')
            . '/lists/best-sellers/history.json?'
            . "author=claire&isbn=9781984826961&title=dessert&offset=0&api-key="
            . env('NYT_API_KEY','0000')
            => Http::response([
                "status" => "OK",
                "copyright" => "Copyright (c) 2022 The New York Times Company.  All Rights Reserved.",
                "num_results" => 1,
                "results" => [
                    [
                        "title" => "DESSERT PERSON",
                        "description" => "",
                        "contributor" => "by Claire Saffitz",
                        "author" => "Claire Saffitz",
                        "contributor_note" => "",
                        "price" => "0.00",
                        "age_group" => "",
                        "publisher" => "Clarkson Potter",
                        "isbns" => [
                            [
                                "isbn10" => "1984826964",
                                "isbn13" => "9781984826961",
                            ],
                        ],
                        "ranks_history" => [
                            [
                                "primary_isbn10" => "1984826964",
                                "primary_isbn13" => "9781984826961",
                                "rank" => 9,
                                "list_name" => "Advice How-To and Miscellaneous",
                                "display_name" => "Advice, How-To & Miscellaneous",
                                "published_date" => "2021-01-03",
                                "bestsellers_date" => "2020-12-19",
                                "weeks_on_list" => 4,
                                "rank_last_week" => 3,
                                "asterisk" => 0,
                                "dagger" => 0,
                            ],
                            [
                                "primary_isbn10" => "1984826964",
                                "primary_isbn13" => "9781984826961",
                                "rank" => 3,
                                "list_name" => "Advice How-To and Miscellaneous",
                                "display_name" => "Advice, How-To & Miscellaneous",
                                "published_date" => "2020-12-27",
                                "bestsellers_date" => "2020-12-12",
                                "weeks_on_list" => 3,
                                "rank_last_week" => 9,
                                "asterisk" => 0,
                                "dagger" => 0,
                            ],
                            [
                                "primary_isbn10" => "1984826964",
                                "primary_isbn13" => "9781984826961",
                                "rank" => 9,
                                "list_name" => "Advice How-To and Miscellaneous",
                                "display_name" => "Advice, How-To & Miscellaneous",
                                "published_date" => "2020-12-20",
                                "bestsellers_date" => "2020-12-05",
                                "weeks_on_list" => 2,
                                "rank_last_week" => 0,
                                "asterisk" => 0,
                                "dagger" => 0,
                            ],
                            [
                                "primary_isbn10" => "1984826964",
                                "primary_isbn13" => "9781984826961",
                                "rank" => 2,
                                "list_name" => "Advice How-To and Miscellaneous",
                                "display_name" => "Advice, How-To & Miscellaneous",
                                "published_date" => "2020-11-08",
                                "bestsellers_date" => "2020-10-24",
                                "weeks_on_list" => 1,
                                "rank_last_week" => 0,
                                "asterisk" => 0,
                                "dagger" => 0,
                            ],
                        ],
                        "reviews" => [
                            [
                                "book_review_link" => "",
                                "first_chapter_link" => "",
                                "sunday_review_link" => "",
                                "article_chapter_link" => "",
                            ],
                        ],
                    ],
                ],
            ]),
            env('NYT_API_URL', 'https://www.google.com')
            . '/lists/best-sellers/history.json?'
            . "api-key=" . env('NYT_API_KEY','0000')
            => Http::response(array (
                'status' => 'OK',
                'copyright' => 'Copyright (c) 2022 The New York Times Company.  All Rights Reserved.',
                'num_results' => 34302,
                'results' =>
                    array (
                        0 =>
                            array (
                                'title' => '"I GIVE YOU MY BODY ..."',
                                'description' => 'The author of the Outlander novels gives tips on writing sex scenes, drawing on examples from the books.',
                                'contributor' => 'by Diana Gabaldon',
                                'author' => 'Diana Gabaldon',
                                'contributor_note' => '',
                                'price' => '0.00',
                                'age_group' => '',
                                'publisher' => 'Dell',
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '0399178570',
                                                'isbn13' => '9780399178573',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                        0 =>
                                            array (
                                                'primary_isbn10' => '0399178570',
                                                'primary_isbn13' => '9780399178573',
                                                'rank' => 8,
                                                'list_name' => 'Advice How-To and Miscellaneous',
                                                'display_name' => 'Advice, How-To & Miscellaneous',
                                                'published_date' => '2016-09-04',
                                                'bestsellers_date' => '2016-08-20',
                                                'weeks_on_list' => 1,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        1 =>
                            array (
                                'title' => '"MOST BLESSED OF THE PATRIARCHS"',
                                'description' => 'A character study that attempts to make sense of Jefferson’s contradictions.',
                                'contributor' => 'by Annette Gordon-Reed and Peter S. Onuf',
                                'author' => 'Annette Gordon-Reed and Peter S Onuf',
                                'contributor_note' => '',
                                'price' => '0.00',
                                'age_group' => '',
                                'publisher' => 'Liveright',
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '0871404427',
                                                'isbn13' => '9780871404428',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                        0 =>
                                            array (
                                                'primary_isbn10' => '0871404427',
                                                'primary_isbn13' => '9780871404428',
                                                'rank' => 16,
                                                'list_name' => 'Hardcover Nonfiction',
                                                'display_name' => 'Hardcover Nonfiction',
                                                'published_date' => '2016-05-01',
                                                'bestsellers_date' => '2016-04-16',
                                                'weeks_on_list' => 1,
                                                'rank_last_week' => 0,
                                                'asterisk' => 1,
                                                'dagger' => 0,
                                            ),
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        2 =>
                            array (
                                'title' => '#ASKGARYVEE',
                                'description' => 'The entrepreneur expands on subjects addressed on his Internet show, like marketing, management and social media.',
                                'contributor' => 'by Gary Vaynerchuk',
                                'author' => 'Gary Vaynerchuk',
                                'contributor_note' => '',
                                'price' => '0.00',
                                'age_group' => '',
                                'publisher' => 'HarperCollins',
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '0062273124',
                                                'isbn13' => '9780062273123',
                                            ),
                                        1 =>
                                            array (
                                                'isbn10' => '0062273132',
                                                'isbn13' => '9780062273130',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                        0 =>
                                            array (
                                                'primary_isbn10' => '0062273124',
                                                'primary_isbn13' => '9780062273123',
                                                'rank' => 5,
                                                'list_name' => 'Business Books',
                                                'display_name' => 'Business',
                                                'published_date' => '2016-04-10',
                                                'bestsellers_date' => '2016-03-26',
                                                'weeks_on_list' => 0,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 1,
                                            ),
                                        1 =>
                                            array (
                                                'primary_isbn10' => '0062273124',
                                                'primary_isbn13' => '9780062273123',
                                                'rank' => 6,
                                                'list_name' => 'Advice How-To and Miscellaneous',
                                                'display_name' => 'Advice, How-To & Miscellaneous',
                                                'published_date' => '2016-03-27',
                                                'bestsellers_date' => '2016-03-12',
                                                'weeks_on_list' => 1,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 1,
                                            ),
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        3 =>
                            array (
                                'title' => '#GIRLBOSS',
                                'description' => 'An online fashion retailer traces her path to success.',
                                'contributor' => 'by Sophia Amoruso',
                                'author' => 'Sophia Amoruso',
                                'contributor_note' => '',
                                'price' => '0.00',
                                'age_group' => '',
                                'publisher' => 'Portfolio/Penguin/Putnam',
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '039916927X',
                                                'isbn13' => '9780399169274',
                                            ),
                                        1 =>
                                            array (
                                                'isbn10' => '1591847931',
                                                'isbn13' => '9781591847939',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                        0 =>
                                            array (
                                                'primary_isbn10' => '1591847931',
                                                'primary_isbn13' => '9781591847939',
                                                'rank' => 8,
                                                'list_name' => 'Business Books',
                                                'display_name' => 'Business',
                                                'published_date' => '2016-03-13',
                                                'bestsellers_date' => '2016-02-27',
                                                'weeks_on_list' => 0,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                        1 =>
                                            array (
                                                'primary_isbn10' => '1591847931',
                                                'primary_isbn13' => '9781591847939',
                                                'rank' => 9,
                                                'list_name' => 'Business Books',
                                                'display_name' => 'Business',
                                                'published_date' => '2016-01-17',
                                                'bestsellers_date' => '2016-01-02',
                                                'weeks_on_list' => 0,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                        2 =>
                                            array (
                                                'primary_isbn10' => '1591847931',
                                                'primary_isbn13' => '9781591847939',
                                                'rank' => 9,
                                                'list_name' => 'Business Books',
                                                'display_name' => 'Business',
                                                'published_date' => '2015-12-13',
                                                'bestsellers_date' => '2015-11-28',
                                                'weeks_on_list' => 0,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                        3 =>
                                            array (
                                                'primary_isbn10' => '1591847931',
                                                'primary_isbn13' => '9781591847939',
                                                'rank' => 8,
                                                'list_name' => 'Business Books',
                                                'display_name' => 'Business',
                                                'published_date' => '2015-11-15',
                                                'bestsellers_date' => '2015-10-31',
                                                'weeks_on_list' => 0,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                        4 =>
                                            array (
                                                'primary_isbn10' => '039916927X',
                                                'primary_isbn13' => '9780399169274',
                                                'rank' => 10,
                                                'list_name' => 'Business Books',
                                                'display_name' => 'Business',
                                                'published_date' => '2014-11-09',
                                                'bestsellers_date' => '2014-10-25',
                                                'weeks_on_list' => 0,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                        5 =>
                                            array (
                                                'primary_isbn10' => '039916927X',
                                                'primary_isbn13' => '9780399169274',
                                                'rank' => 8,
                                                'list_name' => 'Business Books',
                                                'display_name' => 'Business',
                                                'published_date' => '2014-10-12',
                                                'bestsellers_date' => '2014-09-27',
                                                'weeks_on_list' => 0,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                        6 =>
                                            array (
                                                'primary_isbn10' => '039916927X',
                                                'primary_isbn13' => '9780399169274',
                                                'rank' => 14,
                                                'list_name' => 'Advice How-To and Miscellaneous',
                                                'display_name' => 'Advice, How-To & Miscellaneous',
                                                'published_date' => '2014-09-21',
                                                'bestsellers_date' => '2014-09-06',
                                                'weeks_on_list' => 0,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        4 =>
                            array (
                                'title' => '#IMOMSOHARD',
                                'description' => '',
                                'contributor' => 'by Kristin Hensley and Jen Smedley',
                                'author' => 'Kristin Hensley and Jen Smedley',
                                'contributor_note' => '',
                                'price' => '0.00',
                                'age_group' => '',
                                'publisher' => 'HarperOne',
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '006285769X',
                                                'isbn13' => '9780062857699',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                        0 =>
                                            array (
                                                'primary_isbn10' => '006285769X',
                                                'primary_isbn13' => '9780062857699',
                                                'rank' => 10,
                                                'list_name' => 'Advice How-To and Miscellaneous',
                                                'display_name' => 'Advice, How-To & Miscellaneous',
                                                'published_date' => '2019-04-21',
                                                'bestsellers_date' => '2019-04-06',
                                                'weeks_on_list' => 1,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 1,
                                            ),
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        5 =>
                            array (
                                'title' => '#NEVERAGAIN',
                                'description' => 'Students from Marjory Stoneman Douglas High School describe the Valentine\'s Day mass shooting and outline ways to prevent similar incidents.',
                                'contributor' => 'by David Hogg and Lauren Hogg',
                                'author' => 'David Hogg and Lauren Hogg',
                                'contributor_note' => '',
                                'price' => '0.00',
                                'age_group' => '',
                                'publisher' => 'Random House',
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '198480183X',
                                                'isbn13' => '9781984801838',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                        0 =>
                                            array (
                                                'primary_isbn10' => '198480183X',
                                                'primary_isbn13' => '9781984801838',
                                                'rank' => 9,
                                                'list_name' => 'Paperback Nonfiction',
                                                'display_name' => 'Paperback Nonfiction',
                                                'published_date' => '2018-07-08',
                                                'bestsellers_date' => '2018-06-23',
                                                'weeks_on_list' => 1,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        6 =>
                            array (
                                'title' => '$100 STARTUP',
                                'description' => 'How to build a profitable start up for $100 or less and be your own boss.',
                                'contributor' => 'by Chris Guillebeau',
                                'author' => 'Chris Guillebeau',
                                'contributor_note' => '',
                                'price' => '23.00',
                                'age_group' => '',
                                'publisher' => 'Crown Business',
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '0307951529',
                                                'isbn13' => '9780307951526',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        7 =>
                            array (
                                'title' => '$20 PER GALLON',
                                'description' => '',
                                'contributor' => 'by Christopher Steiner',
                                'author' => 'Christopher Steiner',
                                'contributor_note' => '',
                                'price' => '0.00',
                                'age_group' => '',
                                'publisher' => 'Grand Central',
                                'isbns' =>
                                    array (
                                    ),
                                'ranks_history' =>
                                    array (
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        8 =>
                            array (
                                'title' => '\'57, Chicago',
                                'description' => NULL,
                                'contributor' => NULL,
                                'author' => 'Steve Monroe',
                                'contributor_note' => NULL,
                                'price' => '0.00',
                                'age_group' => NULL,
                                'publisher' => NULL,
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '0786867302',
                                                'isbn13' => '9780786867301',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => NULL,
                                                'sunday_review_link' => 'https://www.nytimes.com/2001/07/29/books/books-in-brief-fiction-poetry-319660.html',
                                                'article_chapter_link' => NULL,
                                            ),
                                    ),
                            ),
                        9 =>
                            array (
                                'title' => '\'ROCK OF AGES: \'\'ROLLING STONE\'\' HISTORY OF ROCK AND ROLL\'',
                                'description' => NULL,
                                'contributor' => NULL,
                                'author' => 'GEOFFREY STOKES, KEN TUCKER\' \'ED WARD',
                                'contributor_note' => NULL,
                                'price' => '0.00',
                                'age_group' => NULL,
                                'publisher' => NULL,
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '0671630687',
                                                'isbn13' => '9780671630683',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => NULL,
                                                'sunday_review_link' => 'https://www.nytimes.com/1986/12/28/books/three-chord-music-in-a-three-piece-suit.html',
                                                'article_chapter_link' => NULL,
                                            ),
                                    ),
                            ),
                        10 =>
                            array (
                                'title' => '\'THE HIGH ROAD TO CHINA: GEORGE BOGLE, THE PANCHEN LAMA AND THE FIRST BRITISH EXPEDITION TO TIBET\'',
                                'description' => NULL,
                                'contributor' => NULL,
                                'author' => 'KATE TELTSCHER',
                                'contributor_note' => NULL,
                                'price' => '0.00',
                                'age_group' => NULL,
                                'publisher' => NULL,
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '0374217009',
                                                'isbn13' => '9780374217006',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => NULL,
                                                'sunday_review_link' => 'https://www.nytimes.com/2007/04/22/books/review/Stuart.t.html',
                                                'article_chapter_link' => NULL,
                                            ),
                                    ),
                            ),
                        11 =>
                            array (
                                'title' => '\'TIL DEATH',
                                'description' => '',
                                'contributor' => 'by Sharon Sala',
                                'author' => 'Sharon Sala',
                                'contributor_note' => '',
                                'price' => '0.00',
                                'age_group' => '',
                                'publisher' => 'Harlequin Mira',
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '0778314278',
                                                'isbn13' => '9780778314271',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        12 =>
                            array (
                                'title' => '\'TIL DEATH DO US PART',
                                'description' => 'A matchmaker in Victorian England turns to a crime novelist for help when she starts receiving a series of disturbingly personalized trinkets.',
                                'contributor' => 'by Amanda Quick',
                                'author' => 'Amanda Quick',
                                'contributor_note' => '',
                                'price' => '0.00',
                                'age_group' => '',
                                'publisher' => 'Berkley',
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '069819361X',
                                                'isbn13' => '9780698193611',
                                            ),
                                        1 =>
                                            array (
                                                'isbn10' => '039917446X',
                                                'isbn13' => '9780399174469',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                        0 =>
                                            array (
                                                'primary_isbn10' => '069819361X',
                                                'primary_isbn13' => '9780698193611',
                                                'rank' => 15,
                                                'list_name' => 'Combined Print and E-Book Fiction',
                                                'display_name' => 'Combined Print & E-Book Fiction',
                                                'published_date' => '2016-05-08',
                                                'bestsellers_date' => '2016-04-23',
                                                'weeks_on_list' => 1,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                        1 =>
                                            array (
                                                'primary_isbn10' => '069819361X',
                                                'primary_isbn13' => '9780698193611',
                                                'rank' => 9,
                                                'list_name' => 'E-Book Fiction',
                                                'display_name' => 'E-Book Fiction',
                                                'published_date' => '2016-05-08',
                                                'bestsellers_date' => '2016-04-23',
                                                'weeks_on_list' => 1,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        13 =>
                            array (
                                'title' => '\'Til Faith Do Us Part: How Interfaith Marriage is Transforming America',
                                'description' => NULL,
                                'contributor' => NULL,
                                'author' => 'Naomi Schaefer Riley',
                                'contributor_note' => NULL,
                                'price' => '0.00',
                                'age_group' => NULL,
                                'publisher' => NULL,
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '0199873747',
                                                'isbn13' => '9780199873746',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => NULL,
                                                'sunday_review_link' => 'https://www.nytimes.com/2013/05/26/books/review/til-faith-do-us-part-by-naomi-schaefer-riley.html',
                                                'article_chapter_link' => NULL,
                                            ),
                                    ),
                            ),
                        14 =>
                            array (
                                'title' => '\'TIS THE SEASON',
                                'description' => 'Two classic holiday stories — "Under the Christmas Tree" (2009) and "Midnight Confessions" (2010) — plus the novella "Backward Glance" (1991).',
                                'contributor' => 'by Robyn Carr',
                                'author' => 'Ron Carr',
                                'contributor_note' => '',
                                'price' => '0.00',
                                'age_group' => '',
                                'publisher' => 'Harlequin Mira',
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '0778316645',
                                                'isbn13' => '9780778316640',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                        0 =>
                                            array (
                                                'primary_isbn10' => '0778316645',
                                                'primary_isbn13' => '9780778316640',
                                                'rank' => 18,
                                                'list_name' => 'Mass Market Paperback',
                                                'display_name' => 'Paperback Mass-Market Fiction',
                                                'published_date' => '2014-11-30',
                                                'bestsellers_date' => '2014-11-15',
                                                'weeks_on_list' => 0,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                        1 =>
                                            array (
                                                'primary_isbn10' => '0778316645',
                                                'primary_isbn13' => '9780778316640',
                                                'rank' => 6,
                                                'list_name' => 'Mass Market Paperback',
                                                'display_name' => 'Paperback Mass-Market Fiction',
                                                'published_date' => '2014-11-16',
                                                'bestsellers_date' => '2014-11-01',
                                                'weeks_on_list' => 1,
                                                'rank_last_week' => 0,
                                                'asterisk' => 1,
                                                'dagger' => 0,
                                            ),
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        15 =>
                            array (
                                'title' => '(RE)BORN IN THE USA',
                                'description' => 'The soccer commentator describes how he embraced American popular culture while growing up in Liverpool.',
                                'contributor' => 'by Roger Bennett',
                                'author' => 'Roger Bennett',
                                'contributor_note' => '',
                                'price' => '0.00',
                                'age_group' => '',
                                'publisher' => 'Dey Street',
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '0062958690',
                                                'isbn13' => '9780062958693',
                                            ),
                                        1 =>
                                            array (
                                                'isbn10' => '0062958720',
                                                'isbn13' => '9780062958723',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                        0 =>
                                            array (
                                                'primary_isbn10' => '0062958690',
                                                'primary_isbn13' => '9780062958693',
                                                'rank' => 3,
                                                'list_name' => 'Combined Print and E-Book Nonfiction',
                                                'display_name' => 'Combined Print & E-Book Nonfiction',
                                                'published_date' => '2021-07-18',
                                                'bestsellers_date' => '2021-07-03',
                                                'weeks_on_list' => 1,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                        1 =>
                                            array (
                                                'primary_isbn10' => '0062958690',
                                                'primary_isbn13' => '9780062958693',
                                                'rank' => 1,
                                                'list_name' => 'Hardcover Nonfiction',
                                                'display_name' => 'Hardcover Nonfiction',
                                                'published_date' => '2021-07-18',
                                                'bestsellers_date' => '2021-07-03',
                                                'weeks_on_list' => 1,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 0,
                                            ),
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        16 =>
                            array (
                                'title' => '------, THAT\'S DELICIOUS',
                                'description' => '',
                                'contributor' => 'by Action Bronson with Rachel Wharton',
                                'author' => 'Action Bronson with Rachel Wharton',
                                'contributor_note' => '',
                                'price' => '0.00',
                                'age_group' => '',
                                'publisher' => 'Abrams',
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '1419726552',
                                                'isbn13' => '9781419726552',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                        0 =>
                                            array (
                                                'primary_isbn10' => '1419726552',
                                                'primary_isbn13' => '9781419726552',
                                                'rank' => 9,
                                                'list_name' => 'Advice How-To and Miscellaneous',
                                                'display_name' => 'Advice, How-To & Miscellaneous',
                                                'published_date' => '2017-10-01',
                                                'bestsellers_date' => '2017-09-16',
                                                'weeks_on_list' => 1,
                                                'rank_last_week' => 0,
                                                'asterisk' => 0,
                                                'dagger' => 1,
                                            ),
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        17 =>
                            array (
                                'title' => '...and the Horse He Rode In On: The People V. Kenneth Starr',
                                'description' => NULL,
                                'contributor' => NULL,
                                'author' => 'James Carville',
                                'contributor_note' => NULL,
                                'price' => '0.00',
                                'age_group' => NULL,
                                'publisher' => NULL,
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '0684857340',
                                                'isbn13' => '9780684857343',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => NULL,
                                                'sunday_review_link' => 'https://www.nytimes.com/1998/10/18/books/preaching-to-the-converted.html',
                                                'article_chapter_link' => NULL,
                                            ),
                                    ),
                            ),
                        18 =>
                            array (
                                'title' => '.HACK G.U.   , VOL. 5',
                                'description' => 'This series, set in the future, is about an online, multiplayer game run amok. This volume concludes the tale.',
                                'contributor' => 'by Hamazaki Tatsuya',
                                'author' => 'Hamazaki Tatsuya',
                                'contributor_note' => '',
                                'price' => '10.99',
                                'age_group' => '',
                                'publisher' => 'TOKYOPOP',
                                'isbns' =>
                                    array (
                                    ),
                                'ranks_history' =>
                                    array (
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => '',
                                                'sunday_review_link' => '',
                                                'article_chapter_link' => '',
                                            ),
                                    ),
                            ),
                        19 =>
                            array (
                                'title' => '1 Ragged Ridge Road',
                                'description' => NULL,
                                'contributor' => NULL,
                                'author' => 'David Adams Richards',
                                'contributor_note' => NULL,
                                'price' => '0.00',
                                'age_group' => NULL,
                                'publisher' => NULL,
                                'isbns' =>
                                    array (
                                        0 =>
                                            array (
                                                'isbn10' => '0671003542',
                                                'isbn13' => '9780671003548',
                                            ),
                                    ),
                                'ranks_history' =>
                                    array (
                                    ),
                                'reviews' =>
                                    array (
                                        0 =>
                                            array (
                                                'book_review_link' => '',
                                                'first_chapter_link' => NULL,
                                                'sunday_review_link' => 'https://www.nytimes.com/1997/08/31/books/books-in-brief-fiction-747866.html',
                                                'article_chapter_link' => NULL,
                                            ),
                                    ),
                            ),
                    ),
            )),
        ]);
    }

    /**
     * Best Sellers with No Parameters
     * @return void
     */
    public function test_best_sellers_no_params()
    {
        $res = $this->get('/api/1/nyt/best-sellers');
        $res->assertStatus(200);
        $res->assertJsonStructure($this->jsonStructure);
    }
    /**
     * Best Sellers with All Allowed Params
     * @return void
     */
    public function test_best_sellers_all_params_valid()
    {
        $res = $this->get('/api/1/nyt/best-sellers?author=claire&isbn=9781984826961&title=dessert&offset=0');
        $res->assertStatus(200);
        $res->assertJsonStructure($this->jsonStructure);
    }
    /**
     * Best Sellers with All Allowed Params
     * @return void
     */
    public function test_best_sellers_all_params_isbn_invalid()
    {
        $res = $this->get('/api/1/nyt/best-sellers?author=claire&isbn=spoot&title=dessert&offset=0');
        $res->assertStatus(400);
    }
    /**
     * Best Sellers with All Allowed Params
     * @return void
     */
    public function test_best_sellers_all_params_offset_invalid()
    {
        $res = $this->get('/api/1/nyt/best-sellers?author=claire&isbn=9781984826961&title=dessert&offset=10');
        $res->assertStatus(400);
    }
}
