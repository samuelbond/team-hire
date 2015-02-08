<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 02/02/15
 * Time: 12:00
 */

namespace component\blog;


interface BlogInterface {

    public function createNewBlogEntry(BlogEntry $entry);

    public function getBlogEntry(BlogEntry $entry);

    public function getBlogEntryWithEntryId(BlogEntry $entry);

    public function editBlogEntry(BlogEntry $entry);

    public function commentOnBlogEntry(BlogComment $comment, BlogEntry $entry);

    public function publishBlogEntry(BlogEntry $entry);

    public function publishComment(BlogComment $comment);

    public function createNewCategory(BlogCategory $category);

    public function getAllCategories();

    public function getAllBlogEntries();

    public function getAuthorsBlogEntries($author);

    public function getAllBlogEntryAwaitingPublish();

    public function getAllCommentAwaitingPublish($author);

    public function createANewPublishRequest(BlogEntry $blogEntry);

    public function getAllCommentsForThisBlogEntry(BlogEntry $blogEntry);

    public function getComment(BlogComment $comment);

    public function getBlogEntryInCategory($categoryId);

    public function searchAllBlogEntry($searchFor);

    public function subscribeToBlog($email);



} 