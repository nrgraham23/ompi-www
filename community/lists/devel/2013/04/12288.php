<?
$subject_val = "Re: [OMPI devel] Simplified: Misuse or bug with nested types?";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Apr 23 17:01:31 2013" -->
<!-- isoreceived="20130423210131" -->
<!-- sent="Tue, 23 Apr 2013 17:01:22 -0400" -->
<!-- isosent="20130423210122" -->
<!-- name="Eric Chamberland" -->
<!-- email="Eric.Chamberland_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Simplified: Misuse or bug with nested types?" -->
<!-- id="5176F6A2.5080302_at_giref.ulaval.ca" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="517692EF.3080707_at_giref.ulaval.ca" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Simplified: Misuse or bug with nested types?<br>
<strong>From:</strong> Eric Chamberland (<em>Eric.Chamberland_at_[hidden]</em>)<br>
<strong>Date:</strong> 2013-04-23 17:01:22
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="12289.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] Simplified: Misuse or bug with nested types?"</a>
<li><strong>Previous message:</strong> <a href="12287.php">Eric Chamberland: "Re: [OMPI devel] Simplified: Misuse or bug with nested types?"</a>
<li><strong>In reply to:</strong> <a href="12287.php">Eric Chamberland: "Re: [OMPI devel] Simplified: Misuse or bug with nested types?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="12289.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] Simplified: Misuse or bug with nested types?"</a>
<li><strong>Reply:</strong> <a href="12289.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] Simplified: Misuse or bug with nested types?"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
another information: I just tested the example with Intel MPI 4.0.1.007 
<br>
and it works correctly...
<br>
<p>So the problem seems to be only with OpenMPI... which is the default 
<br>
distribution we use... :-/
<br>
<p>Is my example code too long?
<br>
<p>Eric
<br>
<p>Le 2013-04-23 09:55, Eric Chamberland a &#233;crit :
<br>
<span class="quotelev1">&gt; Sorry,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; here is the attachment...
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Eric
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On 04/23/2013 09:54 AM, Eric Chamberland wrote:
</span><br>
<span class="quotelev2">&gt;&gt; Hi,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I have sent a previous message showing something that I think is a bug
</span><br>
<span class="quotelev2">&gt;&gt; (or maybe a misuse, but...).
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I worked on the example sent to have it simplified: now it is almost
</span><br>
<span class="quotelev2">&gt;&gt; half of the lines of code and the structures are more simple... but
</span><br>
<span class="quotelev2">&gt;&gt; still showing the wrong behaviour.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Briefly, we construct different MPI_datatype and nests them into a final
</span><br>
<span class="quotelev2">&gt;&gt; type which is a:
</span><br>
<span class="quotelev2">&gt;&gt; {MPI_LONG,{{MPI_LONG,MPI_CHAR}*2}
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Here is the output from OpenMPI 1.6.3:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;   Rank 0 send this:
</span><br>
<span class="quotelev2">&gt;&gt;   i: 0 =&gt; {{0},{{3,%},{7,5}}}
</span><br>
<span class="quotelev2">&gt;&gt;   i: 1 =&gt; {{1},{{3,%},{7,5}}}
</span><br>
<span class="quotelev2">&gt;&gt;   i: 2 =&gt; {{2},{{3,%},{7,5}}}
</span><br>
<span class="quotelev2">&gt;&gt;   i: 3 =&gt; {{3},{{3,%},{7,5}}}
</span><br>
<span class="quotelev2">&gt;&gt;   i: 4 =&gt; {{4},{{3,%},{7,5}}}
</span><br>
<span class="quotelev2">&gt;&gt;   i: 5 =&gt; {{5},{{3,%},{7,5}}}
</span><br>
<span class="quotelev2">&gt;&gt; MPI_Recv returned success and everything in MPI_Status is correct after
</span><br>
<span class="quotelev2">&gt;&gt; receive.
</span><br>
<span class="quotelev2">&gt;&gt;   Rank 1 received this:
</span><br>
<span class="quotelev2">&gt;&gt;   i: 0 =&gt; {{0},{{3,%},{-999,$}}} *** ERROR ****
</span><br>
<span class="quotelev2">&gt;&gt;   i: 1 =&gt; {{1},{{3,%},{-999,$}}} *** ERROR ****
</span><br>
<span class="quotelev2">&gt;&gt;   i: 2 =&gt; {{2},{{3,%},{-999,$}}} *** ERROR ****
</span><br>
<span class="quotelev2">&gt;&gt;   i: 3 =&gt; {{3},{{3,%},{-999,$}}} *** ERROR ****
</span><br>
<span class="quotelev2">&gt;&gt;   i: 4 =&gt; {{4},{{3,%},{-999,$}}} *** ERROR ****
</span><br>
<span class="quotelev2">&gt;&gt;   i: 5 =&gt; {{5},{{3,%},{-999,$}}} *** ERROR ****
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Here is the expected output, obtained with mpich-3.0.3:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;   Rank 0 send this:
</span><br>
<span class="quotelev2">&gt;&gt;   i: 0 =&gt; {{0},{{3,%},{7,5}}}
</span><br>
<span class="quotelev2">&gt;&gt;   i: 1 =&gt; {{1},{{3,%},{7,5}}}
</span><br>
<span class="quotelev2">&gt;&gt;   i: 2 =&gt; {{2},{{3,%},{7,5}}}
</span><br>
<span class="quotelev2">&gt;&gt;   i: 3 =&gt; {{3},{{3,%},{7,5}}}
</span><br>
<span class="quotelev2">&gt;&gt;   i: 4 =&gt; {{4},{{3,%},{7,5}}}
</span><br>
<span class="quotelev2">&gt;&gt;   i: 5 =&gt; {{5},{{3,%},{7,5}}}
</span><br>
<span class="quotelev2">&gt;&gt; MPI_Recv returned success and everything in MPI_Status is correct after
</span><br>
<span class="quotelev2">&gt;&gt; receive.
</span><br>
<span class="quotelev2">&gt;&gt;   Rank 1 received this:
</span><br>
<span class="quotelev2">&gt;&gt;   i: 0 =&gt; {{0},{{3,%},{7,5}}} OK
</span><br>
<span class="quotelev2">&gt;&gt;   i: 1 =&gt; {{1},{{3,%},{7,5}}} OK
</span><br>
<span class="quotelev2">&gt;&gt;   i: 2 =&gt; {{2},{{3,%},{7,5}}} OK
</span><br>
<span class="quotelev2">&gt;&gt;   i: 3 =&gt; {{3},{{3,%},{7,5}}} OK
</span><br>
<span class="quotelev2">&gt;&gt;   i: 4 =&gt; {{4},{{3,%},{7,5}}} OK
</span><br>
<span class="quotelev2">&gt;&gt;   i: 5 =&gt; {{5},{{3,%},{7,5}}} OK
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Is it related to the bug reported here:
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/community/lists/devel/2013/04/12267.php">http://www.open-mpi.org/community/lists/devel/2013/04/12267.php</a> ?
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Thanks,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Eric
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="12289.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] Simplified: Misuse or bug with nested types?"</a>
<li><strong>Previous message:</strong> <a href="12287.php">Eric Chamberland: "Re: [OMPI devel] Simplified: Misuse or bug with nested types?"</a>
<li><strong>In reply to:</strong> <a href="12287.php">Eric Chamberland: "Re: [OMPI devel] Simplified: Misuse or bug with nested types?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="12289.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] Simplified: Misuse or bug with nested types?"</a>
<li><strong>Reply:</strong> <a href="12289.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] Simplified: Misuse or bug with nested types?"</a>
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
