package webBlog.ntu.nhd.Web_Java.repository;


import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import webBlog.ntu.nhd.Web_Java.model.entity.Post;

@Repository
public interface PostRepository extends JpaRepository<Post, Long> {
	 List<Post> findByTitleContainingIgnoreCaseOrContentContainingIgnoreCase(String titleKeyword, String contentKeyword);
}