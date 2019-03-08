using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using Forum.Models;

namespace Forum.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home

        private ForumDBEntities db = new ForumDBEntities();
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult Register()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Register(ForumUser x) // skapar en användare genom den mottagna parametern med validation 
        {
            var dump = db.ForumUsers.FirstOrDefault(b => b.Username == x.Username);
            if (dump != null)
            {
                ModelState.AddModelError("", "Invalid username, it is already taken.");
                return View();
            }

             if (dump == null)
            {
                db.ForumUsers.Add(x);
                db.SaveChanges();
                return RedirectToAction("AccountCreated");
            }
            else
            {
                ModelState.AddModelError("", "Failed to create an account.");
                return View();
            }

        }

        public ActionResult AccountCreated()
        {
            return View();
        }

        public ActionResult Login()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Login(ForumUser x) // loggar in och validera rätt användare
        {
            if(x.Username == null || x.UserPassword == null)
            {
                ModelState.AddModelError("", "You have to use your username and password.");
                return View();
            }

            bool validUser = false;

            // validUser = System.Web.Security.FormsAuthentication.Authenticate(x.Username, x.UserPassword);

            validUser = CheckUserFromDB(x.Username, x.UserPassword);

            if (validUser == true)
            {
                System.Web.Security.FormsAuthentication.RedirectFromLoginPage(x.Username, false);
     
                return RedirectToAction("Index", "User");
            }

            ModelState.AddModelError("", "Invalid login");

            return View();


        }

        private bool CheckUserFromDB(string username, string password) // checkar om det finns en user med de specifika username och lösenord
        {
            // linq uttryck som hämtar en user med rätt username o kod. 
            var user = from x in db.ForumUsers
                       where
                    x.Username.ToUpper() == username.ToUpper() && x.UserPassword == password
                       select x;



            if (user.Count() == 1)
            {
                var dump = db.ForumUsers.FirstOrDefault(r => r.Username.ToUpper() == username.ToUpper() && r.UserPassword == password);
                Session["UserID"] = dump.ID;
                
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    }
