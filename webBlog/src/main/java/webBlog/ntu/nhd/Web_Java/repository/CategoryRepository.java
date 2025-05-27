package webBlog.ntu.nhd.Web_Java.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import webBlog.ntu.nhd.Web_Java.model.entity.Category;

public interface CategoryRepository extends JpaRepository<Category, Long> {
}
