<?
$subject_val = "[OMPI devel] RFC: silently allow component open() to fail";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Jan  7 15:03:10 2010" -->
<!-- isoreceived="20100107200310" -->
<!-- sent="Thu, 7 Jan 2010 15:03:04 -0500" -->
<!-- isosent="20100107200304" -->
<!-- name="Jeff Squyres" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="[OMPI devel] RFC: silently allow component open() to fail" -->
<!-- id="F2E71B78-4314-488E-B001-0637B6CC1C01_at_cisco.com" -->
<!-- charset="us-ascii" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> [OMPI devel] RFC: silently allow component open() to fail<br>
<strong>From:</strong> Jeff Squyres (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2010-01-07 15:03:04
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="7284.php">Eugene Loh: "[OMPI devel] MALLOC_MMAP_MAX (and MALLOC_MMAP_THRESHOLD)"</a>
<li><strong>Previous message:</strong> <a href="7282.php">Ralph Castain: "Re: [OMPI devel] Data correctness checks in PML"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="7310.php">Jeff Squyres: "Re: [OMPI devel] RFC: silently allow component open() to fail"</a>
<li><strong>Reply:</strong> <a href="7310.php">Jeff Squyres: "Re: [OMPI devel] RFC: silently allow component open() to fail"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
WHAT: Make the MCA base not print an error message when a component.open() function returns OPAL_ERR_NOT_AVAILABLE.
<br>
<p>WHY: There's currently no silent way for a component to disqualify itself during component.open().
<br>
<p>WHERE: opal/mca/base/mca_base_components.c
<br>
<p>WHEN: &quot;Soon&quot;
<br>
<p>TIMEOUT: Next Tuesday teleconf, 12 Jan 2009 (short timeout because I don't expect this to be controverial)
<br>
<p>-----
<br>
<p>I'm bringing this up because technically this is in the very core of the MCA loading process, so it should go by a few other eyes instead of just committing it.  That being said, it's a pretty simple thing.
<br>
<p>The rationale here is that some components may know right away during their component register or open functions that they want to be disqualified from the entire process.  In the code today, however, if any component register or open function returns != OPAL_SUCCESS, an error message is printed, like this:
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;[hostname:pid] mca: base: components_open: component btl / foo open function failed
<br>
<p>But I think that there *are* cases where a component can know that it wants to disqualify itself right away, and therefore it should be able to return some sort of sentinel value from component.register() or component.open() that indicates &quot;just go ahead and silently disqualify / discard me now&quot;.
<br>
<p>I came across this case in the merge of the ummunotify stuff with the ptmalloc2 component.  It's quite possible that, at run time, the component will determine that neither of those mechanisms are available, and therefore it wants to disqualify itself (it'll know this during component.open()).  Right now, there's no way to do so without causing an error message.  My proposal fixes this case.
<br>
<p>I don't think that this is a big deal; I just wanted other people to eyeball it and ensure I'm not proposing anything insane.
<br>
<p><pre>
-- 
Jeff Squyres
jsquyres_at_[hidden]
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="7284.php">Eugene Loh: "[OMPI devel] MALLOC_MMAP_MAX (and MALLOC_MMAP_THRESHOLD)"</a>
<li><strong>Previous message:</strong> <a href="7282.php">Ralph Castain: "Re: [OMPI devel] Data correctness checks in PML"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="7310.php">Jeff Squyres: "Re: [OMPI devel] RFC: silently allow component open() to fail"</a>
<li><strong>Reply:</strong> <a href="7310.php">Jeff Squyres: "Re: [OMPI devel] RFC: silently allow component open() to fail"</a>
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>
