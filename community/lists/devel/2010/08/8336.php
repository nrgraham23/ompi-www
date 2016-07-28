<?
$subject_val = "Re: [OMPI devel] 1.5rc5 - warnings from Sun C 5.10";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Aug 24 22:34:01 2010" -->
<!-- isoreceived="20100825023401" -->
<!-- sent="Tue, 24 Aug 2010 19:33:40 -0700" -->
<!-- isosent="20100825023340" -->
<!-- name="Paul H. Hargrove" -->
<!-- email="PHHargrove_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] 1.5rc5 - warnings from Sun C 5.10" -->
<!-- id="4C748104.2030406_at_lbl.gov" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="45611483-58B6-4A0B-976D-5E130F9B8E85_at_eecs.utk.edu" -->
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
<strong>Subject:</strong> Re: [OMPI devel] 1.5rc5 - warnings from Sun C 5.10<br>
<strong>From:</strong> Paul H. Hargrove (<em>PHHargrove_at_[hidden]</em>)<br>
<strong>Date:</strong> 2010-08-24 22:33:40
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8337.php">Paul H. Hargrove: "[OMPI devel] Gcc warnings in datatype test code in 1.5rc5"</a>
<li><strong>Previous message:</strong> <a href="8335.php">Paul H. Hargrove: "[OMPI devel] Success on FreeBSD-8.0 (both 1.5rc5 and 1.4.3rc1)"</a>
<li><strong>In reply to:</strong> <a href="8328.php">George Bosilca: "Re: [OMPI devel] 1.5rc5 - warnings from Sun C 5.10"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8346.php">Rolf vandeVaart: "Re: [OMPI devel] 1.5rc5 - warnings from Sun C 5.10"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Following George's advice, I made the following change (NOT yet 
<br>
conditional on Sun compiler), and can confirm that it eliminates the 
<br>
warnings in atomic.h and &quot;make check&quot; still passes.
<br>
<p>-Paul
<br>
<p>--- openmpi-1.5rc5/opal/include/opal/sys/ia32/atomic.h.orig     Tue Aug 
<br>
24 18:40:55 2010
<br>
+++ openmpi-1.5rc5/opal/include/opal/sys/ia32/atomic.h  Wed Dec 31 
<br>
16:00:00 1969
<br>
@@ -166,8 +166,8 @@
<br>
&nbsp;{
<br>
&nbsp;&nbsp;&nbsp;&nbsp;__asm__ __volatile__(
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SMPLOCK &quot;addl %1,%0&quot;
<br>
-                        :&quot;=m&quot; (*v)
<br>
-                        :&quot;ir&quot; (i), &quot;m&quot; (*v));
<br>
+                        :&quot;+m&quot; (*v)
<br>
+                        :&quot;r&quot; (i));
<br>
&nbsp;&nbsp;&nbsp;&nbsp;return (*v);  /* should be an atomic operation */
<br>
&nbsp;}
<br>
&nbsp;
<br>
@@ -183,8 +183,8 @@
<br>
&nbsp;{
<br>
&nbsp;&nbsp;&nbsp;&nbsp;__asm__ __volatile__(
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SMPLOCK &quot;subl %1,%0&quot;
<br>
-                        :&quot;=m&quot; (*v)
<br>
-                        :&quot;ir&quot; (i), &quot;m&quot; (*v));
<br>
+                        :&quot;+m&quot; (*v)
<br>
+                        :&quot;r&quot; (i));
<br>
&nbsp;&nbsp;&nbsp;&nbsp;return (*v);  /* should be an atomic operation */
<br>
&nbsp;}
<br>
&nbsp;
<br>
<p><p><p><p><p><p><p>George Bosilca wrote:
<br>
<span class="quotelev1">&gt; On Aug 24, 2010, at 20:40 , Paul H. Hargrove wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;   
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../openmpi-1.5rc5/opal/include/opal/sys/ia32/atomic.h&quot;, line 170: warning: impossible constraint for &quot;%1&quot; asm operand
</span><br>
<span class="quotelev2">&gt;&gt;     
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;    __asm__ __volatile__(
</span><br>
<span class="quotelev1">&gt;                         SMPLOCK &quot;addl %1,%0&quot;
</span><br>
<span class="quotelev1">&gt;                         :&quot;=m&quot; (*v)
</span><br>
<span class="quotelev1">&gt;                         :&quot;ir&quot; (i), &quot;m&quot; (*v));
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; The problem seems to come from the &quot;ir&quot;. Based on a Sun blog about the gcc style asm inlining support (<a href="http://blogs.sun.com/x86be/entry/gcc_style_asm_inlining_support">http://blogs.sun.com/x86be/entry/gcc_style_asm_inlining_support</a>) it appears that i (any size integer immediate constraint) and r (any registers in rax, rbx, rcx, rdx, rbp, rsi, rdi, rsp, r8 - r15). As we don't only apply our atomics on immediate I think we should drop the &quot;i&quot;.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;   
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../openmpi-1.5rc5/opal/include/opal/sys/ia32/atomic.h&quot;, line 170: warning: parameter in inline asm statement unused: %2
</span><br>
<span class="quotelev2">&gt;&gt;     
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; This one is more trickier. Because of the %2 I suspect that the second (*v) on the inputs is not matched to the first (*v) on the outputs. While this might be significantly bad under some circumstances, in this case I think it can be safely ignored.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; However I would like to try the following asm code instead with the SUN compiler:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;    __asm__ __volatile__(
</span><br>
<span class="quotelev1">&gt;                         SMPLOCK &quot;addl %1,%0&quot;
</span><br>
<span class="quotelev1">&gt;                         :&quot;+m&quot; (*v)
</span><br>
<span class="quotelev1">&gt;                         :&quot;r&quot; (i));
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;   Thanks,
</span><br>
<span class="quotelev1">&gt;     george.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;   
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../openmpi-1.5rc5/opal/include/opal/sys/ia32/atomic.h&quot;, line 187: warning: impossible constraint for &quot;%1&quot; asm operand
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../openmpi-1.5rc5/opal/include/opal/sys/ia32/atomic.h&quot;, line 187: warning: parameter in inline asm statement unused: %2
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; ../../../../openmpi-1.5rc5/ompi/mpi/cxx/file.cc&quot;, line 145: Warning (Anachronism): Formal argument read_conversion_fn of type extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*) in call to MPI_Register_datarep(char*, extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(ompi_datatype_t*,int*,void*), void*) is being passed int(*)(void*,ompi_datatype_t*,int,void*,long long,void*).
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/ompi/mpi/cxx/file.cc&quot;, line 146: Warning (Anachronism): Formal argument write_conversion_fn of type extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*) in call to MPI_Register_datarep(char*, extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(ompi_datatype_t*,int*,void*), void*) is being passed int(*)(void*,ompi_datatype_t*,int,void*,long long,void*).
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/ompi/mpi/cxx/file.cc&quot;, line 147: Warning (Anachronism): Formal argument dtype_file_extent_fn of type extern &quot;C&quot; int(*)(ompi_datatype_t*,int*,void*) in call to MPI_Register_datarep(char*, extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(ompi_datatype_t*,int*,void*), void*) is being passed int(*)(ompi_datatype_t*,int*,void*).
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/ompi/mpi/cxx/file.cc&quot;, line 172: Warning (Anachronism): Formal argument write_conversion_fn of type extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*) in call to MPI_Register_datarep(char*, extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(ompi_datatype_t*,int*,void*), void*) is being passed int(*)(void*,ompi_datatype_t*,int,void*,long long,void*).
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/ompi/mpi/cxx/file.cc&quot;, line 173: Warning (Anachronism): Formal argument dtype_file_extent_fn of type extern &quot;C&quot; int(*)(ompi_datatype_t*,int*,void*) in call to MPI_Register_datarep(char*, extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(ompi_datatype_t*,int*,void*), void*) is being passed int(*)(ompi_datatype_t*,int*,void*).
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/ompi/mpi/cxx/file.cc&quot;, line 197: Warning (Anachronism): Formal argument read_conversion_fn of type extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*) in call to MPI_Register_datarep(char*, extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(ompi_datatype_t*,int*,void*), void*) is being passed int(*)(void*,ompi_datatype_t*,int,void*,long long,void*).
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/ompi/mpi/cxx/file.cc&quot;, line 199: Warning (Anachronism): Formal argument dtype_file_extent_fn of type extern &quot;C&quot; int(*)(ompi_datatype_t*,int*,void*) in call to MPI_Register_datarep(char*, extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(ompi_datatype_t*,int*,void*), void*) is being passed int(*)(ompi_datatype_t*,int*,void*).
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/ompi/mpi/cxx/file.cc&quot;, line 224: Warning (Anachronism): Formal argument dtype_file_extent_fn of type extern &quot;C&quot; int(*)(ompi_datatype_t*,int*,void*) in call to MPI_Register_datarep(char*, extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(void*,ompi_datatype_t*,int,void*,long long,void*), extern &quot;C&quot; int(*)(ompi_datatype_t*,int*,void*), void*) is being passed int(*)(ompi_datatype_t*,int*,void*).
</span><br>
<span class="quotelev2">&gt;&gt; [Though line numbers differ very slightly]
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; NEW, not seen with 1.4.3rc1, warnings:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Many instances of the following:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/orte/mca/ess/ess.h&quot;, line 61: warning: attribute &quot;noreturn&quot; may not be applied to variable, ignored
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/orte/mca/errmgr/errmgr.h&quot;, line 138: warning: attribute &quot;noreturn&quot; may not be applied to variable, ignored
</span><br>
<span class="quotelev2">&gt;&gt; [Due to applying __opal_attribute_noreturn__ to a function pointer]
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Single instances of the following:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../../openmpi-1.5rc5/opal/mca/crs/none/crs_none_module.c&quot;, line 136: warning: statement not reached
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/orte/mca/plm/base/plm_base_rsh_support.c&quot;, line 462: warning: implicit function declaration: rindex
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/orte/mca/plm/base/plm_base_rsh_support.c&quot;, line 462: warning: improper pointer/integer combination: op &quot;=&quot;
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/orte/mca/plm/base/plm_base_rsh_support.c&quot;, line 565: warning: improper pointer/integer combination: op &quot;=&quot;
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../../openmpi-1.5rc5/orte/mca/rmcast/tcp/rmcast_tcp.c&quot;, line 982: warning: assignment type mismatch:
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../../openmpi-1.5rc5/orte/mca/rmcast/tcp/rmcast_tcp.c&quot;, line 1023: warning: assignment type mismatch:
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../../openmpi-1.5rc5/orte/mca/rmcast/udp/rmcast_udp.c&quot;, line 877: warning: assignment type mismatch:
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../../openmpi-1.5rc5/orte/mca/rmcast/udp/rmcast_udp.c&quot;, line 918: warning: assignment type mismatch:
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/orte/tools/orte-ps/orte-ps.c&quot;, line 288: warning: initializer does not fit or is out of range: 0xfffffffe
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../openmpi-1.5rc5/orte/tools/orte-ps/orte-ps.c&quot;, line 289: warning: initializer does not fit or is out of range: 0xfffffffe
</span><br>
<span class="quotelev2">&gt;&gt; &quot;
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../../openmpi-1.5rc5/ompi/mca/common/sm/common_sm_mmap.c&quot;, line 110: warning: improper pointer/integer combination: arg #3
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../../openmpi-1.5rc5/ompi/mca/common/sm/common_sm_mmap.c&quot;, line 135: warning: improper pointer/integer combination: arg #3
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../../openmpi-1.5rc5/ompi/mca/common/sm/common_sm_mmap.c&quot;, line 201: warning: assignment type mismatch:
</span><br>
<span class="quotelev2">&gt;&gt;       pointer to char &quot;=&quot; pointer to int
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../../openmpi-1.5rc5/ompi/mca/common/sm/common_sm_mmap.c&quot;, line 207: warning: assignment type mismatch:
</span><br>
<span class="quotelev2">&gt;&gt;       pointer to char &quot;=&quot; pointer to int
</span><br>
<span class="quotelev2">&gt;&gt; &quot;../../../../../openmpi-1.5rc5/ompi/mca/common/sm/common_sm_mmap.c&quot;, line 280: warning: argument #1 is incompatible with prototype:
</span><br>
<span class="quotelev2">&gt;&gt;       prototype: pointer to char : &quot;/usr/include/sys/mman.h&quot;, line 238
</span><br>
<span class="quotelev2">&gt;&gt;       argument : pointer to struct mca_common_sm_mmap_t {struct opal_list_item_t {..} map_item, pointer to struct mca_common_sm_file_header_t {..} map_seg, pointer to unsigned char map_addr, pointer to unsigned char data_addr, unsigned int map_size, array[1025] of char map_path}
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; -Paul
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; -- 
</span><br>
<span class="quotelev2">&gt;&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; Future Technologies Group
</span><br>
<span class="quotelev2">&gt;&gt; HPC Research Department                   Tel: +1-510-495-2352
</span><br>
<span class="quotelev2">&gt;&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
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
<span class="quotelev2">&gt;&gt;     
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;   
</span><br>
<p><pre>
-- 
Paul H. Hargrove                          PHHargrove_at_[hidden]
Future Technologies Group
HPC Research Department                   Tel: +1-510-495-2352
Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8337.php">Paul H. Hargrove: "[OMPI devel] Gcc warnings in datatype test code in 1.5rc5"</a>
<li><strong>Previous message:</strong> <a href="8335.php">Paul H. Hargrove: "[OMPI devel] Success on FreeBSD-8.0 (both 1.5rc5 and 1.4.3rc1)"</a>
<li><strong>In reply to:</strong> <a href="8328.php">George Bosilca: "Re: [OMPI devel] 1.5rc5 - warnings from Sun C 5.10"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8346.php">Rolf vandeVaart: "Re: [OMPI devel] 1.5rc5 - warnings from Sun C 5.10"</a>
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
