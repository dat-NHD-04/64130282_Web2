package thiGK.ntu64130282.nguyenhuydat_ThiGK.model;

public class Post {
    private int id;
    private String title;
    private String categoryId;
    private String viewUrl;
    private String editUrl;
    private String deleteUrl;

    public Post(int id, String title, String categoryId, String viewUrl, String editUrl, String deleteUrl) {
        this.id = id;
        this.title = title;
        this.categoryId = categoryId;
        this.viewUrl = viewUrl;
        this.editUrl = editUrl;
        this.deleteUrl = deleteUrl;
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

    public String getViewUrl() {
        return viewUrl;
    }

    public void setViewUrl(String viewUrl) {
        this.viewUrl = viewUrl;
    }

    public String getEditUrl() {
        return editUrl;
    }

    public void setEditUrl(String editUrl) {
        this.editUrl = editUrl;
    }

    public String getDeleteUrl() {
        return deleteUrl;
    }

    public void setDeleteUrl(String deleteUrl) {
        this.deleteUrl = deleteUrl;
    }
}
