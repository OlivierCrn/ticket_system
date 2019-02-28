<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="creatingTicket.php" method="post">
                <div class="form-group">
                    <select name="subject" class="form-control" required>
                        <option value="Subject" selected disabled> Subject </option>
                        <option value="OS Issue"> OS Issue </option>
                        <option value="Hardware"> Hardware </option>
                        <option value="Software"> Software </option>
                        <option value="Miscellaneous"> Miscellaneous </option>
                    </select>
                    <div class="form-group">
                        <label for="comment">Explication:</label>
                        <textarea name="content" class="form-control" rows="10" id="comment"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit issue"><br>
                </div>
            </form>
        </div>
    </div>
</div>