using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using Forum.Models;
using System.Net;
using System.Data.Entity;

namespace Forum.Controllers
{
    [Authorize]
    public class TopicController : Controller
    {
        ForumDBEntities db = new ForumDBEntities();
        // GET: Topic
        public ActionResult Index() // läser in alla topics o users som tillhör en topic, returnerar även allt 
        {
            ViewModel MultiModel = new ViewModel();
            MultiModel.ForumUsers = db.ForumUsers.ToList();
            MultiModel.Topics = db.Topics.OrderByDescending(k => k.PostDate).ToList();

            return View(MultiModel);
        }


        public ActionResult Topic(int? topicID) // tar emot ett topicid sedan returnerar en topic samt alla posts som tillhör den valda topic, även användare som äger dem.
        {
            if (topicID == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }

            Topic topic = db.Topics.Find(topicID);

            if (topic == null)
            {
                return HttpNotFound();
            }

            ViewModel MultiModel = new ViewModel();
            MultiModel.Topics = db.Topics.Where(m => m.ID == topic.ID).ToList();
            MultiModel.Posts = db.Posts.Where(m => m.TopicID == topic.ID).ToList();
            MultiModel.ForumUsers = db.ForumUsers.ToList();

            return View(MultiModel);
        }

        public ActionResult CreatePost(int? topicID) // tar emot en topicid för att sedan skapa en post som tillhör den topic samt användaren. 
        {

            Topic topic2 = db.Topics.FirstOrDefault(c => c.ID == topicID);

            Post post = new Post();

            post.TopicID = topic2.ID;
            post.UserID = int.Parse(Session["UserID"].ToString());

            return View(post);
        }
        [HttpPost]
        public ActionResult CreatePost(Post x) // lägger till en post i databasen
        {
            x.UserID = int.Parse(Session["UserID"].ToString());
            x.PostDate = DateTime.Now;
            db.Posts.Add(x);
            db.SaveChanges();

            return RedirectToAction("Topic", new { topicID = x.TopicID });
        }



        public ActionResult DeletePost(int? postID)
        {
            Post removingPost = db.Posts.FirstOrDefault(x => x.ID == postID);
            db.Posts.Remove(removingPost);
            db.SaveChanges();
            return RedirectToAction("Topic", new { topicID = removingPost.TopicID });
        }






        public ActionResult Create()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Create(Topic x) // skapar en topic i databasen
        {
            x.UserID = int.Parse(Session["UserID"].ToString()); // tryparse? 
            x.PostDate = DateTime.Now;
            db.Topics.Add(x);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        public ActionResult DeleteTopic(int? topicID) // börja 
        {
            Topic removingTopic = db.Topics.FirstOrDefault(x => x.ID == topicID);
            db.Topics.Remove(removingTopic);
            db.SaveChanges();
            return RedirectToAction("Index");
        }





        public ActionResult EditTopic(int? topicID)
        {
            Topic topic = db.Topics.FirstOrDefault(x => x.ID == topicID);

            return View(topic);
        }
        [HttpPost]
        public ActionResult EditTopic(Topic x) // fel värden kommer in, saknas user id topic id
        {

            db.Entry(x).State = EntityState.Modified;
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        public ActionResult EditPost(int? postID)
        {
            Post Post = db.Posts.FirstOrDefault(x => x.ID == postID);

            return View(Post);
        }
        [HttpPost]
        public ActionResult EditPost(Post x)
        {
            db.Entry(x).State = EntityState.Modified;
            db.SaveChanges();
            return RedirectToAction("Topic", new {topicID = x.TopicID });
        }
    }
}