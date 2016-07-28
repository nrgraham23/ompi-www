<?
$subject_val = "Re: [OMPI devel] v1.5 r25914 DOA";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Feb 22 14:54:17 2012" -->
<!-- isoreceived="20120222195417" -->
<!-- sent="Wed, 22 Feb 2012 12:54:09 -0700" -->
<!-- isosent="20120222195409" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] v1.5 r25914 DOA" -->
<!-- id="B7740524-9A7B-481C-A12F-6FC5955E1630_at_open-mpi.org" -->
<!-- charset="iso-8859-1" -->
<!-- inreplyto="4F4540D7.2010200_at_oracle.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] v1.5 r25914 DOA<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-02-22 14:54:09
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="10565.php">Paul H. Hargrove: "Re: [OMPI devel] v1.5 build failure w/ Solaris Studio 12.2 on Linux"</a>
<li><strong>Previous message:</strong> <a href="10563.php">Eugene Loh: "Re: [OMPI devel] v1.5 r25914 DOA"</a>
<li><strong>In reply to:</strong> <a href="10563.php">Eugene Loh: "Re: [OMPI devel] v1.5 r25914 DOA"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="10568.php">Eugene Loh: "Re: [OMPI devel] v1.5 r25914 DOA"</a>
<li><strong>Reply:</strong> <a href="10568.php">Eugene Loh: "Re: [OMPI devel] v1.5 r25914 DOA"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
On Feb 22, 2012, at 12:24 PM, Eugene Loh wrote:
<br>
<p><span class="quotelev1">&gt; On 2/22/2012 11:08 AM, Ralph Castain wrote:
</span><br>
<span class="quotelev2">&gt;&gt; On Feb 22, 2012, at 11:59 AM, Brice Goglin wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Le 22/02/2012 17:48, Ralph Castain a &#233;crit :
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On Feb 22, 2012, at 9:39 AM, Eugene Loh wrote
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On 2/21/2012 10:31 PM, Eugene Loh wrote:
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; ...  &quot;sockets&quot; is unknown and hwloc returns 0 for num_sockets and OMPI pukes on divide by zero.  OS info was listed in the original message (below).  Might we want to do something else?  E.g., assume num_sockets==1 when num_sockets==0 (if you know what I mean)?  So, which one (or more) of the following should be fixed?
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; *) on this platform, hwloc finds no socket level
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; *) therefore hwloc returns num_sockets==0 to OMPI
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; *) OMPI divides by 0 and barfs on basically everything
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Okay.  So, Brice's other e-mail indicates that the first two are &quot;not really uncommon&quot;:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On 2/22/2012 7:55 AM, Brice Goglin wrote:
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Anyway, we have seen other systems (mostly non-Linux) where lstopo
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; reports nothing interesting (only one machine object with multiple PU
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; children). So numsockets==0 isn't really uncommon.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; So, it seems to me that OMPI needs to handle the num_sockets==0 case rather than just dividing by num_sockets.  This is v1.5 orte_odls_base_open() since r25914.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Unfortunately, just artificially setting the num_sockets to 1 won't solve much - you'll get past that point in the code, but attempts to bind are likely to fail down the road. Fixing it will require some significant effort.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Given we haven't heard reports of this before, I'm not convinced it is a widespread problem.
</span><br>
<span class="quotelev1">&gt; I assume we don't see the problem as widespread because it was only introduced into  v1.5 in r25914.  In my mind, the real question is how common it is for hwloc to decide numsockets==0.  On that one, Brice asserts it &quot;isn't really uncommon.&quot;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; For now, let's just use the mca param and see what happens.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I am probably missing something but: Why would setting num_sockets to 1
</span><br>
<span class="quotelev3">&gt;&gt;&gt; work fine as a mca param, while artificially setting it as said above
</span><br>
<span class="quotelev3">&gt;&gt;&gt; wouldn't ?
</span><br>
<span class="quotelev2">&gt;&gt; Because the param means that it isn't hardwired into the code base. I want to first verify that artificially forcing num_sockets to 1 doesn't break the code down the road, so the less change to find out, the better.
</span><br>
<span class="quotelev1">&gt; That sounds a lot different to me than the earlier statement.  Thanks for asking that question, Brice.  Anyhow, I tried using &quot;--mca orte_num_sockets 1&quot; and that seems to allow basic programs to run.
</span><br>
<p>That doesn't really address the issue, though. What I want to know is: what happens when you try to bind processes? What about -bind-to-socket, and -persocket options? Etc.
<br>
<p>Reason I'm concerned: I'm not sure what happens if the socket layer isn't present. The logic in 1.5 is pretty old, but I believe it relies heavily on sockets being present.
<br>
<p><span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="10565.php">Paul H. Hargrove: "Re: [OMPI devel] v1.5 build failure w/ Solaris Studio 12.2 on Linux"</a>
<li><strong>Previous message:</strong> <a href="10563.php">Eugene Loh: "Re: [OMPI devel] v1.5 r25914 DOA"</a>
<li><strong>In reply to:</strong> <a href="10563.php">Eugene Loh: "Re: [OMPI devel] v1.5 r25914 DOA"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="10568.php">Eugene Loh: "Re: [OMPI devel] v1.5 r25914 DOA"</a>
<li><strong>Reply:</strong> <a href="10568.php">Eugene Loh: "Re: [OMPI devel] v1.5 r25914 DOA"</a>
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
