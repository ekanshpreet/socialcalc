<div class="left_panel">
<form name="addEvent" action="">
    <fieldset>
        <label class="field left" for="name" id="name_label">Name:</label>
        <input type="text" name="name" id="name" size="13" value="" class="text-input right" /><br/><br/>
        <label class="error" id="name_error"></label><br/>

        <label class="field left" for="class" id="class_label">Class:</label>
        <input type="text" name="class" id="class" size="13" value="" class="text-input right" /><br/><br/>
        <label class="error" id="class_error"></label><br/>
        <label class="field left" for="section" id="section_label">Section:</label>
        <input type="text" name="section" id="section" size="13" value="" class="text-input right" /><br/><br/>
        <label class="error" id="section_error"></label><br/>

        <label class="field left" for="date" id="date_label">Date:</label>
        <input type="text" name="date" id="date" size="13" value="" class="text-input right" /><br/><br/>
        <label class="hint" id="date_desc">In YYYY-MM-DD format</label><br/>
        <label class="error" id="date_error"></label><br/>
            
        <label class="field left" for="time" id="time_label">Start Time:</label>
        <input type="text" name="time" id="time" size="13" value="" class="text-input right" /><br/><br/>
        <label class="hint" id="time_desc">In 24 hour format</label><br/>
        <label class="error" id="time_error"></label><br/>
              
        <label class="field left" for="duration" id="duration_label">Duration:</label>
        <input type="text" name="duration" id="duration" size="13" value="" class="text-input right" /><br/><br/>
        <label class="hint" id="duration_desc">In hours (e.g. 1.5)</label><br/>
        <label class="error" id="duration_error"></label><br/>
        
        <label for="desc" id="desc_label">Description:</label>
        <textarea name="desc" id="desc" rows="10" cols="20" value="" class="text-input right"></textarea><br/><br/>
        <label class="error" for="desc" id="desc_error">This field is required.</label><br />
              
        <input type="submit" name="submit" class="button bigger" id="addEvent-button" value="Add Event" />
    </fieldset>
</form>
</div>