//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated from a template.
//
//     Manual changes to this file may cause unexpected behavior in your application.
//     Manual changes to this file will be overwritten if the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

namespace Forum.Models
{
    using System;
    using System.Collections.Generic;
    
    public partial class Post
    {
        public int ID { get; set; }
        public string Content { get; set; }
        public System.DateTime PostDate { get; set; }
        public int UserID { get; set; }
        public int TopicID { get; set; }
    
        public virtual ForumUser ForumUser { get; set; }
        public virtual Topic Topic { get; set; }
    }
}
