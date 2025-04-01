package thiGK.ntu64130282.nguyenhuydat_ThiGK.model;

public class Post {
    private int id;
    private String title;
    private String categoryId;

    public Post(int id, String title, String categoryId) {
        this.id = id;
        this.title = title;
        this.categoryId = categoryId;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getCategoryId() {
        return categoryId;
    }

    public void setCategoryId(String categoryId) {
        this.categoryId = categoryId;
    }
}
