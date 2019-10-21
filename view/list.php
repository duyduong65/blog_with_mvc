
<a href="index.php?page=add-post" style="border: solid 1px; font-size: 24px">Add</a>
<table border="1">

    <tr>
        <td>Id</td>
        <td>Title</td>
        <td>Teaser</td>
        <td>Content</td>
        <td>Created</td>
    </tr>
    <?php foreach ($posts as$key => $post): ?>
        <tr>
            <td><?php echo ++$key?></td>
            <td><?php echo $post->getTitle()?></td>
            <td><?php echo $post->getTeaser()?></td>
            <td><?php echo $post->getContent()?></td>
            <td><?php echo $post->getCreated()?></td>
            <td><a href="index.php?page=delete-post&id=<?php echo $post->getId()?>">Delete</a></td>
            <td><a href="index.php?page=edit-post&id=<?php echo $post->getId()?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
</table>