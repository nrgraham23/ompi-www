<?
$subject_val = "Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch master	updated. dev-1195-gfbb7c80";
include("../../include/msg-header.inc");
?>
<!-- received="Mon Mar  2 12:52:51 2015" -->
<!-- isoreceived="20150302175251" -->
<!-- sent="Mon, 2 Mar 2015 17:43:32 +0000" -->
<!-- isosent="20150302174332" -->
<!-- name="Alexander Mikheev" -->
<!-- email="alexm_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch master	updated. dev-1195-gfbb7c80" -->
<!-- id="DBXPR05MB0466F24643C01F72EBDEF6AD8100_at_DBXPR05MB046.eurprd05.prod.outlook.com" -->
<!-- charset="utf-8" -->
<!-- inreplyto="822EF73A-2CAC-4DD2-9ADD-724DA22B4F09_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch master	updated. dev-1195-gfbb7c80<br>
<strong>From:</strong> Alexander Mikheev (<em>alexm_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-03-02 12:43:32
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17081.php">George Bosilca: "Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch master updated. dev-1195-gfbb7c80"</a>
<li><strong>Previous message:</strong> <a href="17079.php">Ralph Castain: "Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch master updated. dev-1195-gfbb7c80"</a>
<li><strong>In reply to:</strong> <a href="17079.php">Ralph Castain: "Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch master updated. dev-1195-gfbb7c80"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="17082.php">George Bosilca: "Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch master updated. dev-1195-gfbb7c80"</a>
<li><strong>Reply:</strong> <a href="17082.php">George Bosilca: "Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch master updated. dev-1195-gfbb7c80"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Mxm needs that barrier. Otherwise some ranks may hung trying to close mxm connections
<br>

<br>
<span class="quotelev1">&gt; -----Original Message-----
</span><br>
<span class="quotelev1">&gt; From: devel [mailto:devel-bounces_at_[hidden]] On Behalf Of Ralph
</span><br>
<span class="quotelev1">&gt; Castain
</span><br>
<span class="quotelev1">&gt; Sent: Monday, March 02, 2015 5:05 PM
</span><br>
<span class="quotelev1">&gt; To: devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subject: Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch
</span><br>
<span class="quotelev1">&gt; master updated. dev-1195-gfbb7c80
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; It&#226;&#128;&#153;s your code, so you are welcome to do this if you want. I&#226;&#128;&#153;ll just point out
</span><br>
<span class="quotelev1">&gt; that his is a really big hit in total execution time at scale as it will be done in
</span><br>
<span class="quotelev1">&gt; addition to the barrier already performed in MPI_Finalize
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; So you are going to do _two_ barriers during shutdown.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt; &gt; On Mar 2, 2015, at 5:43 AM, gitdub_at_[hidden] wrote:
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; This is an automated email from the git hooks/post-receive script. It
</span><br>
<span class="quotelev2">&gt; &gt; was generated because a ref change was pushed to the repository
</span><br>
<span class="quotelev2">&gt; &gt; containing the project &quot;open-mpi/ompi&quot;.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; The branch, master has been updated
</span><br>
<span class="quotelev2">&gt; &gt;       via  fbb7c80312cbcd823346e89a56f5d83e8620c57c (commit)
</span><br>
<span class="quotelev2">&gt; &gt;       via  168c83ed9592120fd2199e8280b517ab0060e136 (commit)
</span><br>
<span class="quotelev2">&gt; &gt;      from  42f5a36ee3f1e400aa251804725b86192c9df9fa (commit)
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Those revisions listed above that are new to this repository have not
</span><br>
<span class="quotelev2">&gt; &gt; appeared on any other notification email; so we list those revisions
</span><br>
<span class="quotelev2">&gt; &gt; in full, below.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; - Log
</span><br>
<span class="quotelev2">&gt; &gt; -----------------------------------------------------------------
</span><br>
<span class="quotelev2">&gt; &gt; <a href="https://github.com/open-">https://github.com/open-</a>
</span><br>
<span class="quotelev1">&gt; mpi/ompi/commit/fbb7c80312cbcd823346e89a56f5d8
</span><br>
<span class="quotelev2">&gt; &gt; 3e8620c57c
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; commit fbb7c80312cbcd823346e89a56f5d83e8620c57c
</span><br>
<span class="quotelev2">&gt; &gt; Merge: 42f5a36 168c83e
</span><br>
<span class="quotelev2">&gt; &gt; Author: Mike Dubman &lt;miked_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt; &gt; Date:   Mon Mar 2 15:43:32 2015 +0200
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;    Merge pull request #439 from alex-mikheev/topic/mxm_finalize_fix
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;    OMPI/MXM: add out of band barrier at the end of del_procs
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; <a href="https://github.com/open-">https://github.com/open-</a>
</span><br>
<span class="quotelev1">&gt; mpi/ompi/commit/168c83ed9592120fd2199e8280b517
</span><br>
<span class="quotelev2">&gt; &gt; ab0060e136
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; commit 168c83ed9592120fd2199e8280b517ab0060e136
</span><br>
<span class="quotelev2">&gt; &gt; Author: Alex Mikheev &lt;alexm_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt; &gt; Date:   Mon Mar 2 12:56:02 2015 +0200
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;    OMPI/MXM: add out of band barrier at the end of del_procs
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;    mxm shutdown requires out of band barrier
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; diff --git a/ompi/mca/mtl/mxm/mtl_mxm.c
</span><br>
<span class="quotelev1">&gt; b/ompi/mca/mtl/mxm/mtl_mxm.c
</span><br>
<span class="quotelev2">&gt; &gt; index 1a4e21a..ed4089a 100644
</span><br>
<span class="quotelev2">&gt; &gt; --- a/ompi/mca/mtl/mxm/mtl_mxm.c
</span><br>
<span class="quotelev2">&gt; &gt; +++ b/ompi/mca/mtl/mxm/mtl_mxm.c
</span><br>
<span class="quotelev2">&gt; &gt; @@ -617,6 +617,7 @@ int ompi_mtl_mxm_del_procs(struct
</span><br>
<span class="quotelev1">&gt; mca_mtl_base_module_t *mtl, size_t nprocs,
</span><br>
<span class="quotelev2">&gt; &gt;             OBJ_RELEASE(endpoint);
</span><br>
<span class="quotelev2">&gt; &gt;         }
</span><br>
<span class="quotelev2">&gt; &gt;     }
</span><br>
<span class="quotelev2">&gt; &gt; +    opal_pmix.fence(NULL, 0);
</span><br>
<span class="quotelev2">&gt; &gt;     return OMPI_SUCCESS;
</span><br>
<span class="quotelev2">&gt; &gt; }
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; diff --git a/ompi/mca/pml/yalla/pml_yalla.c
</span><br>
<span class="quotelev2">&gt; &gt; b/ompi/mca/pml/yalla/pml_yalla.c index 2cfa6ca..d53cb7c 100644
</span><br>
<span class="quotelev2">&gt; &gt; --- a/ompi/mca/pml/yalla/pml_yalla.c
</span><br>
<span class="quotelev2">&gt; &gt; +++ b/ompi/mca/pml/yalla/pml_yalla.c
</span><br>
<span class="quotelev2">&gt; &gt; @@ -240,6 +240,7 @@ int mca_pml_yalla_del_procs(struct ompi_proc_t
</span><br>
<span class="quotelev1">&gt; **procs, size_t nprocs)
</span><br>
<span class="quotelev2">&gt; &gt;         PML_YALLA_VERBOSE(2, &quot;disconnected from rank %ld&quot;, procs[i]-
</span><br>
<span class="quotelev2">&gt; &gt;super.proc_name);
</span><br>
<span class="quotelev2">&gt; &gt;         procs[i]-&gt;proc_endpoints[OMPI_PROC_ENDPOINT_TAG_PML] = NULL;
</span><br>
<span class="quotelev2">&gt; &gt;     }
</span><br>
<span class="quotelev2">&gt; &gt; +    opal_pmix.fence(NULL, 0);
</span><br>
<span class="quotelev2">&gt; &gt;     return OMPI_SUCCESS;
</span><br>
<span class="quotelev2">&gt; &gt; }
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; ----------------------------------------------------------------------
</span><br>
<span class="quotelev2">&gt; &gt; -
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Summary of changes:
</span><br>
<span class="quotelev2">&gt; &gt; ompi/mca/mtl/mxm/mtl_mxm.c     | 1 +
</span><br>
<span class="quotelev2">&gt; &gt; ompi/mca/pml/yalla/pml_yalla.c | 1 +
</span><br>
<span class="quotelev2">&gt; &gt; 2 files changed, 2 insertions(+)
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; hooks/post-receive
</span><br>
<span class="quotelev2">&gt; &gt; --
</span><br>
<span class="quotelev2">&gt; &gt; open-mpi/ompi
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; ompi-commits mailing list
</span><br>
<span class="quotelev2">&gt; &gt; ompi-commits_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/ompi-commits">http://www.open-mpi.org/mailman/listinfo.cgi/ompi-commits</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Searchable archives: <a href="http://www.open-">http://www.open-</a>
</span><br>
<span class="quotelev1">&gt; mpi.org/community/lists/devel/2015/03/index.php
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17081.php">George Bosilca: "Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch master updated. dev-1195-gfbb7c80"</a>
<li><strong>Previous message:</strong> <a href="17079.php">Ralph Castain: "Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch master updated. dev-1195-gfbb7c80"</a>
<li><strong>In reply to:</strong> <a href="17079.php">Ralph Castain: "Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch master updated. dev-1195-gfbb7c80"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="17082.php">George Bosilca: "Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch master updated. dev-1195-gfbb7c80"</a>
<li><strong>Reply:</strong> <a href="17082.php">George Bosilca: "Re: [OMPI devel] [OMPI commits] Git: open-mpi/ompi branch master updated. dev-1195-gfbb7c80"</a>
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
