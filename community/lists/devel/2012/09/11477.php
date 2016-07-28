<?
$subject_val = "Re: [OMPI devel] trunk's mapping to nodes... local host";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Sep  7 12:53:14 2012" -->
<!-- isoreceived="20120907165314" -->
<!-- sent="Fri, 7 Sep 2012 09:53:07 -0700" -->
<!-- isosent="20120907165307" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] trunk's mapping to nodes... local host" -->
<!-- id="394BCCBF-BF71-4CDF-952D-21B54AC23491_at_open-mpi.org" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="FB0C824D-EA5D-4E68-8C17-9011D81FB301_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] trunk's mapping to nodes... local host<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-09-07 12:53:07
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11478.php">Jeff Squyres: "[OMPI devel] OMPI git / mercurial mirrors"</a>
<li><strong>Previous message:</strong> <a href="11476.php">Ralph Castain: "Re: [OMPI devel] trunk's mapping to nodes... local host"</a>
<li><strong>In reply to:</strong> <a href="11476.php">Ralph Castain: "Re: [OMPI devel] trunk's mapping to nodes... local host"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Looks to be working fine with current trunk r27267:
<br>
<p>Ralphs-iMac:ompi-mrplus rhc$ mpirun -n 2 --nooversubscribe -host localhost,localhost,localhost --display-allocation hostname
<br>
<p>======================   ALLOCATED NODES   ======================
<br>
<p>&nbsp;Data for node: Ralphs-iMac.local	Num slots: 3	Max slots: 0
<br>
<p>=================================================================
<br>
Ralphs-iMac.local
<br>
Ralphs-iMac.local
<br>
<p><p><p>On Sep 7, 2012, at 9:35 AM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; I can take a look at it - but it might be worth checking the trunk now as several related changes were committed over the last two days
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Sep 7, 2012, at 9:20 AM, Eugene Loh &lt;eugene.loh_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Maybe this is related to Reuti's &quot;-hostfile ignored in 1.6.1&quot; on the users mail list, but not quite sure.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Let's pretend my nodes are called local, r1, and r2.  That is, I launch mpirun from &quot;local&quot; and there are two other (remote) nodes available to me.  With the trunk (e.g., v1.9 r27247), I get
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;   % mpirun --bynode --nooversubscribe --host r1,r1,r1,r2,r2,r2 -n 6 --tag-output hostname
</span><br>
<span class="quotelev2">&gt;&gt;   [1,0]&lt;stdout&gt;:r1
</span><br>
<span class="quotelev2">&gt;&gt;   [1,1]&lt;stdout&gt;:r2
</span><br>
<span class="quotelev2">&gt;&gt;   [1,2]&lt;stdout&gt;:r1
</span><br>
<span class="quotelev2">&gt;&gt;   [1,3]&lt;stdout&gt;:r2
</span><br>
<span class="quotelev2">&gt;&gt;   [1,4]&lt;stdout&gt;:r1
</span><br>
<span class="quotelev2">&gt;&gt;   [1,5]&lt;stdout&gt;:r2
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; which seems right to me.  But when the local node is involved:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;   % mpirun --bynode --nooversubscribe --host local,local,local,r1,r1,r1 -np 4 --tag-output hostname
</span><br>
<span class="quotelev2">&gt;&gt;   [1,0]&lt;stdout&gt;:local
</span><br>
<span class="quotelev2">&gt;&gt;   [1,1]&lt;stdout&gt;:r1
</span><br>
<span class="quotelev2">&gt;&gt;   [1,2]&lt;stdout&gt;:r1
</span><br>
<span class="quotelev2">&gt;&gt;   [1,3]&lt;stdout&gt;:r1
</span><br>
<span class="quotelev2">&gt;&gt;   % mpirun --bynode --nooversubscribe --host local,local,local,r1,r1,r1 -np 5 --tag-output hostname
</span><br>
<span class="quotelev2">&gt;&gt;   --------------------------------------------------------------------------
</span><br>
<span class="quotelev2">&gt;&gt;   There are not enough slots available in the system to satisfy the 5 slots
</span><br>
<span class="quotelev2">&gt;&gt;   that were requested by the application:
</span><br>
<span class="quotelev2">&gt;&gt;     hostname
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;   Either request fewer slots for your application, or make more slots available
</span><br>
<span class="quotelev2">&gt;&gt;   for use.
</span><br>
<span class="quotelev2">&gt;&gt;   --------------------------------------------------------------------------
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; I'm not seeing all the local slots I should be seeing.  We're seeing wide-scale MTT trunk failures due to this problem.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; There is a similar loss of local slots with hostfile syntax.  E.g.,
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;   % hostname
</span><br>
<span class="quotelev2">&gt;&gt;   local
</span><br>
<span class="quotelev2">&gt;&gt;   % cat               hostfile
</span><br>
<span class="quotelev2">&gt;&gt;   local
</span><br>
<span class="quotelev2">&gt;&gt;   r1
</span><br>
<span class="quotelev2">&gt;&gt;   % mpirun --hostfile hostfile -n 2 hostname
</span><br>
<span class="quotelev2">&gt;&gt;   --------------------------------------------------------------------------
</span><br>
<span class="quotelev2">&gt;&gt;   A hostfile was provided that contains at least one node not
</span><br>
<span class="quotelev2">&gt;&gt;   present in the allocation:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;     hostfile:  hostfile
</span><br>
<span class="quotelev2">&gt;&gt;     node:      local
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;   If you are operating in a resource-managed environment, then only
</span><br>
<span class="quotelev2">&gt;&gt;   nodes that are in the allocation can be used in the hostfile. You
</span><br>
<span class="quotelev2">&gt;&gt;   may find relative node syntax to be a useful alternative to
</span><br>
<span class="quotelev2">&gt;&gt;   specifying absolute node names see the orte_hosts man page for
</span><br>
<span class="quotelev2">&gt;&gt;   further information.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;   --------------------------------------------------------------------------
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; The problem is solved with &quot;--mca orte_default_hostname hostfile&quot;.
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
<li><strong>Next message:</strong> <a href="11478.php">Jeff Squyres: "[OMPI devel] OMPI git / mercurial mirrors"</a>
<li><strong>Previous message:</strong> <a href="11476.php">Ralph Castain: "Re: [OMPI devel] trunk's mapping to nodes... local host"</a>
<li><strong>In reply to:</strong> <a href="11476.php">Ralph Castain: "Re: [OMPI devel] trunk's mapping to nodes... local host"</a>
<!-- nextthread="start" -->
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
