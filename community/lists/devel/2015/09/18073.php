<?
$subject_val = "Re: [OMPI devel] The issue with OMPI_FREE_LIST_GET_MT()";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Sep 18 01:26:54 2015" -->
<!-- isoreceived="20150918052654" -->
<!-- sent="Fri, 18 Sep 2015 08:26:50 +0300" -->
<!-- isosent="20150918052650" -->
<!-- name="&#208;&#144;&#208;&#187;&#208;&#181;&#208;&#186;&#209;&#129;&#208;&#181;&#208;&#185; &#208;&#160;&#209;&#139;&#208;&#182;&#208;&#184;&#209;&#133;" -->
<!-- email="avryzhikh_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] The issue with OMPI_FREE_LIST_GET_MT()" -->
<!-- id="677be3df03cd69ac46ee2982b9edc980_at_mail.gmail.com" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="CAMJJpkWA2VdKt+RBaXhT_-HXE_Fc9j3YD9UoxhX=r5X--kbnNg_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] The issue with OMPI_FREE_LIST_GET_MT()<br>
<strong>From:</strong> &#208;&#144;&#208;&#187;&#208;&#181;&#208;&#186;&#209;&#129;&#208;&#181;&#208;&#185; &#208;&#160;&#209;&#139;&#208;&#182;&#208;&#184;&#209;&#133; (<em>avryzhikh_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-09-18 01:26:50
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18074.php">Paul Hargrove: "[OMPI devel] PMIX vs Solaris"</a>
<li><strong>Previous message:</strong> <a href="18072.php">Mark Santcroos: "Re: [OMPI devel] orte-dvm and orte_max_vm_size"</a>
<li><strong>In reply to:</strong> <a href="18071.php">George Bosilca: "Re: [OMPI devel] The issue with OMPI_FREE_LIST_GET_MT()"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
OK,
<br>
<p>It is clear.
<br>
<p><p><p>Regards,
<br>
<p>Alexey
<br>
<p><p><p><p><p>*From:* devel [mailto:devel-bounces_at_[hidden]] *On Behalf Of *George
<br>
Bosilca
<br>
*Sent:* Thursday, September 17, 2015 10:36 PM
<br>
*To:* Open MPI Developers
<br>
*Subject:* Re: [OMPI devel] The issue with OMPI_FREE_LIST_GET_MT()
<br>
<p><p><p>Alexey,
<br>
<p><p><p>There is a conceptual different between GET and WAIT: one can return NULL
<br>
while the other cannot. If you want a solution with do {} while, I think
<br>
the best place is specifically in the PML OB1 recv functions (around the
<br>
OMPI_FREE_LIST_GET_MT) and not inside the OMPI_FREE_LIST_GET_MT  macro
<br>
itself.
<br>
<p><p><p>&nbsp;&nbsp;George.
<br>
<p><p><p><p><p>On Thu, Sep 17, 2015 at 2:35 AM, &#208;&#144;&#208;&#187;&#208;&#181;&#208;&#186;&#209;&#129;&#208;&#181;&#208;&#185; &#208;&#160;&#209;&#139;&#208;&#182;&#208;&#184;&#209;&#133; &lt;avryzhikh_at_[hidden]&gt;
<br>
wrote:
<br>
<p>George,
<br>
<p>Thank you for response.
<br>
<p>In my opinion our solution with do/while() loop  in  OMPI_FREE_LIST_GET_MT
<br>
is better for our MPI+OpenMP hybrid application than using
<br>
OMPI_FREE_LIST_WAIT_MT.
<br>
<p>Because in case OMPI_FREE_LIST_WAIT_MT MPI_Irecv()  will be suspended in
<br>
opal_progress() until one of MPI_Irecv() requests  from other thread is
<br>
completed.
<br>
<p>And it is not the case when the list reached   free_list_max_num  limit.
<br>
The situation is that the threads consumed   all items from free list
<br>
&nbsp;&nbsp;before one other thread completed ompi_free_list_grow() and that thread
<br>
executing  ompi_free_list_grow() got NULL.
<br>
<p><p><p>Sorry for my poor English.
<br>
<p><p><p>Alexey.
<br>
<p><p><p>*From:* devel [mailto:devel-bounces_at_[hidden]] *On Behalf Of *George
<br>
Bosilca
<br>
*Sent:* Wednesday, September 16, 2015 10:18 PM
<br>
<p><p>*To:* Open MPI Developers
<br>
*Subject:* Re: [OMPI devel] The issue with OMPI_FREE_LIST_GET_MT()
<br>
<p><p><p>On Wed, Sep 16, 2015 at 3:11 PM, &#208;&#146;&#208;&#187;&#208;&#176;&#208;&#180;&#208;&#184;&#208;&#188;&#208;&#184;&#209;&#128; &#208;&#162;&#209;&#128;&#209;&#131;&#209;&#137;&#208;&#184;&#208;&#189; &lt;vdtruschin_at_[hidden]&gt;
<br>
wrote:
<br>
<p>Sorry, &#226;&#128;&#156;We saw the following problem in OMPI_FREE_LIST_GET_MT&#226;&#128;&#166;&#226;&#128;&#157;.
<br>
<p><p><p>That's exactly what the WAIT macro is supposed to solve, wait (grow the
<br>
freelist and call opal_progress) until an item become available.
<br>
<p><p><p>&nbsp;&nbsp;George.
<br>
<p><p><p><p><p><p><p>*From:* &#208;&#146;&#208;&#187;&#208;&#176;&#208;&#180;&#208;&#184;&#208;&#188;&#208;&#184;&#209;&#128; &#208;&#162;&#209;&#128;&#209;&#131;&#209;&#137;&#208;&#184;&#208;&#189; [mailto:vdtruschin_at_[hidden]]
<br>
*Sent:* Wednesday, September 16, 2015 10:09 PM
<br>
*To:* 'Open MPI Developers'
<br>
*Subject:* RE: [OMPI devel] The issue with OMPI_FREE_LIST_GET_MT()
<br>
<p><p><p>George,
<br>
<p><p><p>You are right. The sequence of calls in our test is MPI_Irecv -&gt;
<br>
mca_pml_ob1_irecv -&gt; MCA_PML_OB1_RECV_REQUEST_ALLOC. We will try to use
<br>
OMPI_FREE_LIST_WAIT_MT.
<br>
<p><p><p>We saw the following problem in OMPI_FREE_LIST_WAIT_MT. It returned NULL in
<br>
case when thread A was suspended after the call of  ompi_free_list_grow. At
<br>
this time others threads took all items from free list at the first call of
<br>
opal_atomic_lifo_pop in macro. So, when thread A was unsuspended and call
<br>
the second opal_atomic_lifo_pop in macro - it returned NULL.
<br>
<p><p><p>Best regards,
<br>
<p>Vladimir.
<br>
<p><p><p>*From:* devel [mailto:devel-bounces_at_[hidden]
<br>
&lt;devel-bounces_at_[hidden]&gt;] *On Behalf Of *George Bosilca
<br>
*Sent:* Wednesday, September 16, 2015 7:00 PM
<br>
*To:* Open MPI Developers
<br>
*Subject:* Re: [OMPI devel] The issue with OMPI_FREE_LIST_GET_MT()
<br>
<p><p><p>Alexey,
<br>
<p><p><p>This is not necessarily the fix for all cases. Most of the internal uses of
<br>
the free_list can easily accommodate to the fact that no more elements are
<br>
available. Based on your description of the problem I would assume you
<br>
encounter this problem once the MCA_PML_OB1_RECV_REQUEST_ALLOC is called.
<br>
In this particular case the problem is that fact that we call
<br>
OMPI_FREE_LIST_GET_MT and that the upper level is unable to correctly deal
<br>
with the case where the returned item is NULL. In this particular case the
<br>
real fix is to use the blocking version of the free_list accessor (similar
<br>
to the case for send) OMPI_FREE_LIST_WAIT_MT.
<br>
<p><p><p><p><p>It is also possible that I misunderstood your problem. IF the solution
<br>
above doesn't work can you describe exactly where the NULL return of the
<br>
OMPI_FREE_LIST_GET_MT is creating an issue?
<br>
<p><p><p>George.
<br>
<p><p><p><p><p>On Wed, Sep 16, 2015 at 9:03 AM, &#208;&#144;&#208;&#187;&#208;&#181;&#208;&#186;&#209;&#129;&#208;&#181;&#208;&#185; &#208;&#160;&#209;&#139;&#208;&#182;&#208;&#184;&#209;&#133; &lt;avryzhikh_at_[hidden]&gt;
<br>
wrote:
<br>
<p>Hi all,
<br>
<p>We experimented with MPI+OpenMP hybrid application (MPI_THREAD_MULTIPLE
<br>
support level)  where several threads submits a lot of MPI_Irecv() requests
<br>
simultaneously and encountered an intermittent bug
<br>
OMPI_ERR_TEMP_OUT_OF_RESOURCE after MCA_PML_OB1_RECV_REQUEST_ALLOC()
<br>
because  OMPI_FREE_LIST_GET_MT()  returned NULL.  Investigating this bug we
<br>
found that sometimes the thread calling ompi_free_list_grow()  don&#226;&#128;&#153;t have
<br>
any free items in LIFO list at exit because other threads  retrieved  all
<br>
new items at opal_atomic_lifo_pop()
<br>
<p>So we suggest to change OMPI_FREE_LIST_GET_MT() as below:
<br>
<p><p><p>#define OMPI_FREE_LIST_GET_MT(fl, item)
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;{
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;item = (ompi_free_list_item_t*)
<br>
opal_atomic_lifo_pop(&amp;((fl)-&gt;super));             \
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if( OPAL_UNLIKELY(NULL == item) )
<br>
{                                               \
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(opal_using_threads())
<br>
{                                                    \
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;int rc;
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\
<br>
<p><p>opal_mutex_lock(&amp;((fl)-&gt;fl_lock));                                        \
<br>
<p><p>do                                                                        \
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rc = ompi_free_list_grow((fl),
<br>
(fl)-&gt;fl_num_per_alloc);               \
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if( OPAL_UNLIKELY(rc != OMPI_SUCCESS))
<br>
break;                         \
<br>
<p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;item = (ompi_free_list_item_t*)
<br>
opal_atomic_lifo_pop(&amp;((fl)-&gt;super)); \
<br>
<p><p>\
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;} while
<br>
(!item);                                                          \
<br>
<p><p>opal_mutex_unlock(&amp;((fl)-&gt;fl_lock));                                      \
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;} else {
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ompi_free_list_grow((fl),
<br>
(fl)-&gt;fl_num_per_alloc);                        \
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;item = (ompi_free_list_item_t*)
<br>
opal_atomic_lifo_pop(&amp;((fl)-&gt;super));     \
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;} /* opal_using_threads() */
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;} /* NULL == item
<br>
*/                                                              \
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;}
<br>
<p><p><p><p><p>Another workaround is to increase the value of  pml_ob1_free_list_inc
<br>
parameter.
<br>
<p><p><p>Regards,
<br>
<p>Alexey
<br>
<p><p><p><p>_______________________________________________
<br>
devel mailing list
<br>
devel_at_[hidden]
<br>
Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
<br>
Link to this post:
<br>
<a href="http://www.open-mpi.org/community/lists/devel/2015/09/18039.php">http://www.open-mpi.org/community/lists/devel/2015/09/18039.php</a>
<br>
<p><p><p><p>_______________________________________________
<br>
devel mailing list
<br>
devel_at_[hidden]
<br>
Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
<br>
Link to this post:
<br>
<a href="http://www.open-mpi.org/community/lists/devel/2015/09/18054.php">http://www.open-mpi.org/community/lists/devel/2015/09/18054.php</a>
<br>
<p><p><p><p>_______________________________________________
<br>
devel mailing list
<br>
devel_at_[hidden]
<br>
Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
<br>
Link to this post:
<br>
<a href="http://www.open-mpi.org/community/lists/devel/2015/09/18061.php">http://www.open-mpi.org/community/lists/devel/2015/09/18061.php</a>
<br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-18073/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18074.php">Paul Hargrove: "[OMPI devel] PMIX vs Solaris"</a>
<li><strong>Previous message:</strong> <a href="18072.php">Mark Santcroos: "Re: [OMPI devel] orte-dvm and orte_max_vm_size"</a>
<li><strong>In reply to:</strong> <a href="18071.php">George Bosilca: "Re: [OMPI devel] The issue with OMPI_FREE_LIST_GET_MT()"</a>
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
