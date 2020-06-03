<h1>Edit student</h1>
<form method='post' action=''>
    <div class="form-group">
        <label for="name">name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter a name" name="name" value ="<?php if (isset($student["name"])) echo $student["name"];?>">
    </div>

    <div class="form-group">
        <label for="age">age</label>
        <input type="text" class="form-control" id="age" placeholder="Enter a age" name="age" value ="<?php if (isset($student["age"])) echo $student["age"];?>">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>