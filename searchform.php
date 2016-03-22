    <form id="searchform" method="get" action="/index.php">
      <div>
         <input type="text" name="s" id="s" onblur="if (this.value == ''){this.value = 'your search begins here';}" onfocus="if(this.value = 'your search begins here') {this.value = '';}" value="your search begins here" size="16" />
         <input type="submit"  id="searchsubmit" value="Search"/>
      </div>
     </form>