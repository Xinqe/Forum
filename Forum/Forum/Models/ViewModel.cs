using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Forum.Models
{
    public class ViewModel
    {
        public List<Topic> Topics { get; set; }
        public List<ForumUser> ForumUsers { get; set; }
        public List<Post> Posts { get; set; }
    }
}