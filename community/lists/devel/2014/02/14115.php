<?
$subject_val = "Re: [OMPI devel] v1.7.5a1: mpirun failure on ppc/linux (regression	vs 1.7.4)";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Feb 12 08:58:07 2014" -->
<!-- isoreceived="20140212135807" -->
<!-- sent="Wed, 12 Feb 2014 13:58:05 +0000" -->
<!-- isosent="20140212135805" -->
<!-- name="Jeff Squyres (jsquyres)" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] v1.7.5a1: mpirun failure on ppc/linux (regression	vs 1.7.4)" -->
<!-- id="9CFABD80-FE38-4CC5-BE77-7F4D76113467_at_cisco.com" -->
<!-- charset="iso-8859-1" -->
<!-- inreplyto="CAAvDA14De4DyVrJFChE5iAxWZ8dF7ADAv_=PwxOpzWUYBXO8fA_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] v1.7.5a1: mpirun failure on ppc/linux (regression	vs 1.7.4)<br>
<strong>From:</strong> Jeff Squyres (jsquyres) (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-02-12 08:58:05
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="14116.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [PATCH] Re: Still having issues w/ opal_path_nfs and	EPERM"</a>
<li><strong>Previous message:</strong> <a href="14114.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] v1.7 and trunk: hello_oshmemfh link failure with	xlc/ppc32/linux"</a>
<li><strong>In reply to:</strong> <a href="14063.php">Paul Hargrove: "Re: [OMPI devel] v1.7.5a1: mpirun failure on ppc/linux (regression vs 1.7.4)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="14117.php">Ralph Castain: "Re: [OMPI devel] v1.7.5a1: mpirun failure on ppc/linux (regression	vs 1.7.4)"</a>
<li><strong>Reply:</strong> <a href="14117.php">Ralph Castain: "Re: [OMPI devel] v1.7.5a1: mpirun failure on ppc/linux (regression	vs 1.7.4)"</a>
<li><strong>Reply:</strong> <a href="14132.php">Paul Hargrove: "Re: [OMPI devel] v1.7.5a1: mpirun failure on ppc/linux (regression vs 1.7.4)"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Has this issue been resolved?
<br>
<p><p>On Feb 9, 2014, at 5:35 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Below is some info collected from a core generated from running ring_c without mpirun.
</span><br>
<span class="quotelev1">&gt; It looks like a bogus btl_module pointer or corrupted object is the culprit in this crash.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Core was generated by `./ring_c '.
</span><br>
<span class="quotelev1">&gt; Program terminated with signal 11, Segmentation fault.
</span><br>
<span class="quotelev1">&gt; #0  0x00000080c9b990ac in .strcmp () from /lib64/libc.so.6
</span><br>
<span class="quotelev1">&gt; Missing separate debuginfos, use: debuginfo-install glibc-2.12-1.47.el6_2.5.ppc64 libibverbs-1.1.5-3.el6.ppc64 librdmacm-1.0.14.1-3.el6.ppc64 numactl-2.0.3-9.el6.ppc64 sssd-client-1.5.1-66.el6_2.3.ppc64
</span><br>
<span class="quotelev1">&gt; (gdb) where
</span><br>
<span class="quotelev1">&gt; #0  0x00000080c9b990ac in .strcmp () from /lib64/libc.so.6
</span><br>
<span class="quotelev1">&gt; #1  0x00000fffa1490c7c in mca_bml_r2_add_btls ()
</span><br>
<span class="quotelev1">&gt;     at /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/openmpi-1.7.5a1r30639/ompi/mca/bml/r2/bml_r2.c:101
</span><br>
<span class="quotelev1">&gt; #2  0x00000fffa1490f1c in mca_bml_r2_add_procs (nprocs=1, procs=0x1002b1ebac0, reachable=0xfffed51b058)
</span><br>
<span class="quotelev1">&gt;     at /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/openmpi-1.7.5a1r30639/ompi/mca/bml/r2/bml_r2.c:156
</span><br>
<span class="quotelev1">&gt; #3  0x00000fffa169df3c in mca_pml_ob1_add_procs (procs=0x1002b1ebac0, nprocs=1)
</span><br>
<span class="quotelev1">&gt;     at /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/openmpi-1.7.5a1r30639/ompi/mca/pml/ob1/pml_ob1.c:332
</span><br>
<span class="quotelev1">&gt; #4  0x00000fffa13b11f0 in ompi_mpi_init (argc=1, argv=0xfffed51b778, requested=0, provided=0xfffed51b264)
</span><br>
<span class="quotelev1">&gt;     at /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/openmpi-1.7.5a1r30639/ompi/runtime/ompi_mpi_init.c:776
</span><br>
<span class="quotelev1">&gt; #5  0x00000fffa13ff670 in PMPI_Init (argc=0xfffed51b360, argv=0xfffed51b368) at pinit.c:84
</span><br>
<span class="quotelev1">&gt; #6  0x00000000100009ac in main (argc=1, argv=0xfffed51b778) at ring_c.c:19
</span><br>
<span class="quotelev1">&gt; (gdb) up
</span><br>
<span class="quotelev1">&gt; #1  0x00000fffa1490c7c in mca_bml_r2_add_btls ()
</span><br>
<span class="quotelev1">&gt;     at /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/openmpi-1.7.5a1r30639/ompi/mca/bml/r2/bml_r2.c:101
</span><br>
<span class="quotelev1">&gt; 101                 if (0 == 
</span><br>
<span class="quotelev1">&gt; (gdb) l
</span><br>
<span class="quotelev1">&gt; 96              selected_btl != (mca_btl_base_selected_module_t*)opal_list_get_end(btls);
</span><br>
<span class="quotelev1">&gt; 97              selected_btl =  (mca_btl_base_selected_module_t*)opal_list_get_next(selected_btl)) {
</span><br>
<span class="quotelev1">&gt; 98              mca_btl_base_module_t *btl = selected_btl-&gt;btl_module;
</span><br>
<span class="quotelev1">&gt; 99              mca_bml_r2.btl_modules[mca_bml_r2.num_btl_modules++] = btl;
</span><br>
<span class="quotelev1">&gt; 100             for (i = 0; NULL != btl_names_argv &amp;&amp; NULL != btl_names_argv[i]; ++i) {
</span><br>
<span class="quotelev1">&gt; 101                 if (0 == 
</span><br>
<span class="quotelev1">&gt; 102                     strcmp(btl_names_argv[i],
</span><br>
<span class="quotelev1">&gt; 103                            btl-&gt;btl_component-&gt;btl_version.mca_component_name)) {
</span><br>
<span class="quotelev1">&gt; 104                     break;
</span><br>
<span class="quotelev1">&gt; 105                 }
</span><br>
<span class="quotelev1">&gt; (gdb) print i
</span><br>
<span class="quotelev1">&gt; $1 = 0
</span><br>
<span class="quotelev1">&gt; (gdb) print btl_names_argv[i]
</span><br>
<span class="quotelev1">&gt; $2 = 0x1002b1cfc40 &quot;self&quot;
</span><br>
<span class="quotelev1">&gt; (gdb) print btl-&gt;btl_component-&gt;btl_version.mca_component_name
</span><br>
<span class="quotelev1">&gt; Cannot access memory at address 0x38
</span><br>
<span class="quotelev1">&gt; (gdb) print btl-&gt;btl_component
</span><br>
<span class="quotelev1">&gt; $3 = (mca_btl_base_component_t *) 0x0
</span><br>
<span class="quotelev1">&gt; (gdb) print *btl
</span><br>
<span class="quotelev1">&gt; $4 = {btl_component = 0x0, btl_eager_limit = 33, btl_rndv_eager_limit = 5715139723404663124, 
</span><br>
<span class="quotelev1">&gt;   btl_max_send_size = 4998801257537028948, btl_rdma_pipeline_send_length = 32, 
</span><br>
<span class="quotelev1">&gt;   btl_rdma_pipeline_frag_size = 113, btl_min_rdma_pipeline_size = 16046253926196952813, 
</span><br>
<span class="quotelev1">&gt;   btl_exclusivity = 4095, btl_latency = 2700574648, btl_bandwidth = 1, btl_flags = 1886351212, 
</span><br>
<span class="quotelev1">&gt;   btl_seg_size = 17590591428656, btl_add_procs = 0x1af00000000, btl_del_procs = 0xfffa0dc5b80, 
</span><br>
<span class="quotelev1">&gt;   btl_register = 0xfffa0dc5b80, btl_finalize = 0x100000001, btl_alloc = 0xfffa0dc5b58, 
</span><br>
<span class="quotelev1">&gt;   btl_free = 0x1002b1d0760, btl_prepare_src = 0x25, btl_prepare_dst = 0x221, btl_send = 0, btl_sendi = 0x31, 
</span><br>
<span class="quotelev1">&gt;   btl_put = 0x62746c5f75736e69, btl_get = 0x635f77616e745f6e, btl_dump = 0x756d615f64657669, 
</span><br>
<span class="quotelev1">&gt;   btl_mpool = 0x63655f6173736967, btl_register_error = 0x6e6d656e74000000, btl_ft_event = 0x31}
</span><br>
<span class="quotelev1">&gt; [...]
</span><br>
<span class="quotelev1">&gt; (gdb) print btl
</span><br>
<span class="quotelev1">&gt; $10 = (mca_btl_base_module_t *) 0x1002b1d03d0
</span><br>
<span class="quotelev1">&gt; (gdb) print *selected_btl
</span><br>
<span class="quotelev1">&gt; $11 = {super = {super = {obj_magic_id = 16046253926196952813, obj_class = 0xfffa17bf290, 
</span><br>
<span class="quotelev1">&gt;       obj_reference_count = 1, 
</span><br>
<span class="quotelev1">&gt;       cls_init_file_name = 0xfffa173e6e0 &quot;/home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/openmpi-1.7.5a1r30639/ompi/mca/btl/base/btl_base_select.c&quot;, cls_init_lineno = 139}, opal_list_next = 0xfffa18b59c8, 
</span><br>
<span class="quotelev1">&gt;     opal_list_prev = 0x1002b1c1eb0, item_free = 1, opal_list_item_refcount = 1, 
</span><br>
<span class="quotelev1">&gt;     opal_list_item_belong_to = 0xfffa18b59a0}, btl_component = 0xfffa17c2570, btl_module = 0x1002b1d03d0}
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Sun, Feb 9, 2014 at 12:32 AM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; I have tried building the current v1.7 tarball (1.7.5a1r30639) with gcc on two ppc64/linux machines and one ppc32/linux.  All three die in MPI_Init when I try to run ring_c. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I've retested 1.7.4 on both ppc64 machines, and thankfully the problem is not present.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Each of them at least dies with what looks like a potentially useful backtrace:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; $ mpirun -mca btl sm,self -np 2 examples/ring_c
</span><br>
<span class="quotelev1">&gt; *** glibc detected *** examples/ring_c: double free or corruption (fasttop): 0x000001003f1d5ce0 ***
</span><br>
<span class="quotelev1">&gt; ======= Backtrace: =========
</span><br>
<span class="quotelev1">&gt; /lib64/libc.so.6[0x80c9b8f4f4]
</span><br>
<span class="quotelev1">&gt; /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/INST/lib/libmpi.so.1(mca_btl_sm_add_procs-0x2db2c8)[0xfffa29e59a8]
</span><br>
<span class="quotelev1">&gt; /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/INST/lib/libmpi.so.1(+0x2311bc)[0xfffa29711bc]
</span><br>
<span class="quotelev1">&gt; /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/INST/lib/libmpi.so.1(mca_pml_ob1_add_procs-0x14f514)[0xfffa2b7df3c]
</span><br>
<span class="quotelev1">&gt; /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/INST/lib/libmpi.so.1(ompi_mpi_init-0x421ff0)[0xfffa28911f0]
</span><br>
<span class="quotelev1">&gt; /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/INST/lib/libmpi.so.1(MPI_Init-0x3d7120)[0xfffa28df670]
</span><br>
<span class="quotelev1">&gt; examples/ring_c[0x100009ac]
</span><br>
<span class="quotelev1">&gt; /lib64/libc.so.6[0x80c9b2bcd8]
</span><br>
<span class="quotelev1">&gt; /lib64/libc.so.6(__libc_start_main-0x184e00)[0x80c9b2bed0]
</span><br>
<span class="quotelev1">&gt; [bd-login:51140] WARNING: common_sm_module_unlink failed.
</span><br>
<span class="quotelev1">&gt; [bd-login:51140] WARNING: common_sm_module_unlink failed.
</span><br>
<span class="quotelev1">&gt; [bd-login:51140] WARNING:  unlink failed.
</span><br>
<span class="quotelev1">&gt; [bd-login:51140] WARNING:  unlink failed.
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] *** Process received signal ***
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] Signal: Aborted (6)
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] Signal code:  (-6)
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] [ 0] [0xfffa2da0418]
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] [ 1] /lib64/libc.so.6(abort-0x16b278)[0x80c9b46ed8]
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] [ 2] /lib64/libc.so.6[0x80c9b87568]
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] [ 3] /lib64/libc.so.6[0x80c9b8f4f4]
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] [ 4] /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/INST/lib/libmpi.so.1(mca_btl_sm_add_procs-0x2db2c8)[0xfffa29e59a8]
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] [ 5] /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/INST/lib/libmpi.so.1(+0x2311bc)[0xfffa29711bc]
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] [ 6] /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/INST/lib/libmpi.so.1(mca_pml_ob1_add_procs-0x14f514)[0xfffa2b7df3c]
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] [ 7] /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/INST/lib/libmpi.so.1(ompi_mpi_init-0x421ff0)[0xfffa28911f0]
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] [ 8] /home/hargrov1/OMPI/openmpi-1.7-latest-linux-ppc64-gcc/INST/lib/libmpi.so.1(MPI_Init-0x3d7120)[0xfffa28df670]
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] [ 9] examples/ring_c[0x100009ac]
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] [10] /lib64/libc.so.6[0x80c9b2bcd8]
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] [11] /lib64/libc.so.6(__libc_start_main-0x184e00)[0x80c9b2bed0]
</span><br>
<span class="quotelev1">&gt; [bd-login:51141] *** End of error message ***
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; $ mpirun -mca btl sm,self -np 2 examples/ring_c
</span><br>
<span class="quotelev1">&gt; [fc6:27829] *** Process received signal ***
</span><br>
<span class="quotelev1">&gt; [fc6:27829] Signal: Segmentation fault (11)
</span><br>
<span class="quotelev1">&gt; [fc6:27829] Signal code: Address not mapped (1)
</span><br>
<span class="quotelev1">&gt; [fc6:27829] Failing at address: 0x805aa7c9e0
</span><br>
<span class="quotelev1">&gt; [fc6:27829] [ 0] [0x100428]
</span><br>
<span class="quotelev1">&gt; [fc6:27829] [ 1] /lib64/ld64.so.1(_rtld_global+0x0)[0x804a7d19b8]
</span><br>
<span class="quotelev1">&gt; [fc6:27829] [ 2] /lib64/libc.so.6[0x804a888f34]
</span><br>
<span class="quotelev1">&gt; [fc6:27829] [ 3] /lib64/libc.so.6(__libc_malloc-0xf95c4)[0x804a88aab4]
</span><br>
<span class="quotelev1">&gt; [fc6:27829] [ 4] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc64/INST/lib/libmpi.so.1(mca_pml_ob1_comm_init_size-0x124550)[0x40000393078]
</span><br>
<span class="quotelev1">&gt; [fc6:27829] [ 5] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc64/INST/lib/libmpi.so.1(mca_pml_ob1_add_comm-0x1276dc)[0x4000038fc1c]
</span><br>
<span class="quotelev1">&gt; [fc6:27829] [ 6] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc64/INST/lib/libmpi.so.1(ompi_mpi_init-0x36fb38)[0x40000130c30]
</span><br>
<span class="quotelev1">&gt; [fc6:27829] [ 7] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc64/INST/lib/libmpi.so.1(MPI_Init-0x3289fc)[0x4000017b34c]
</span><br>
<span class="quotelev1">&gt; [fc6:27829] [ 8] examples/ring_c[0x100009b0]
</span><br>
<span class="quotelev1">&gt; [fc6:27829] [ 9] /lib64/libc.so.6[0x804a829734]
</span><br>
<span class="quotelev1">&gt; [fc6:27829] [10] /lib64/libc.so.6(__libc_start_main-0x15730c)[0x804a8299b4]
</span><br>
<span class="quotelev1">&gt; [fc6:27829] *** End of error message ***
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; $ mpirun -mca btl sm,self -np 2 examples/ring_c
</span><br>
<span class="quotelev1">&gt; *** glibc detected *** examples/ring_c: double free or corruption (!prev): 0x101b5560 ***
</span><br>
<span class="quotelev1">&gt; ======= Backtrace: =========
</span><br>
<span class="quotelev1">&gt; /lib/libc.so.6(+0xfe74dd4)[0x480d0dd4]
</span><br>
<span class="quotelev1">&gt; /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(mca_btl_sm_add_procs+0x66c)[0xfc720c0]
</span><br>
<span class="quotelev1">&gt; /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(+0x15f7a0)[0xfc5e7a0]
</span><br>
<span class="quotelev1">&gt; /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(mca_pml_ob1_add_procs+0x14c)[0xfdecc50]
</span><br>
<span class="quotelev1">&gt; /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(ompi_mpi_init+0xcec)[0xfb96eb4]
</span><br>
<span class="quotelev1">&gt; /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(MPI_Init+0x1e4)[0xfbdd878]
</span><br>
<span class="quotelev1">&gt; examples/ring_c[0x10000724]
</span><br>
<span class="quotelev1">&gt; /lib/libc.so.6(+0xfe0e0fc)[0x4806a0fc]
</span><br>
<span class="quotelev1">&gt; /lib/libc.so.6(+0xfe0e2a0)[0x4806a2a0]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] *** Process received signal ***
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] Signal: Aborted (6)
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] Signal code:  (-6)
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] [ 0] [0x100370]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] [ 1] [0xbfd3a008]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] [ 2] /lib/libc.so.6(abort+0x25c)[0x48084a2c]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] [ 3] /lib/libc.so.6(+0xfe6cc9c)[0x480c8c9c]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] [ 4] /lib/libc.so.6(+0xfe74dd4)[0x480d0dd4]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] [ 5] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(mca_btl_sm_add_
</span><br>
<span class="quotelev1">&gt; procs+0x66c)[0xfc720c0]   
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] [ 6] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(+0x15f7a0)[0xfc5e7a0]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] [ 7] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(mca_pml_ob1_add_procs+0x14c)[0xfdecc50]  
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] [ 8] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(ompi_mpi_init+0xcec)[0xfb96eb4]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] [ 9] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(MPI_Init+0x1e4)[0xfbdd878]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] [10] examples/ring_c[0x10000724]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] [11] /lib/libc.so.6(+0xfe0e0fc)[0x4806a0fc]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421.n2001:02573] WARNING: common_sm_module_unlink failed.
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] [12] /lib/libc.so.6(+0xfe0e2a0)[0x4806a2a0]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02574] *** End of error message ***
</span><br>
<span class="quotelev1">&gt; [pcp-k-421.n2001:02573] WARNING: common_sm_module_unlink failed.
</span><br>
<span class="quotelev1">&gt; [pcp-k-421.n2001:02573] WARNING:  unlink failed.
</span><br>
<span class="quotelev1">&gt; [pcp-k-421.n2001:02573] WARNING: A system call failed during shared memory initialization that should unlink failed.
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] *** Process received signal ***
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] Signal: Segmentation fault (11)
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] Signal code: Address not mapped (1)
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] Failing at address: 0x3f000008
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] [ 0] [0x100370]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] [ 1] [0xffffffff]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] [ 2] /lib/libc.so.6(__libc_malloc+0x8c)[0x480d525c]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] [ 3] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(+0x2eb7f8)[0xfdea7f8]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] [ 4] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(+0x2eb5a0)[0xfdea5a0]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] [ 5] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(mca_pml_ob1_add_comm+0x40)[0xfdec108]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] [ 6] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(ompi_mpi_init+0xd6c)[0xfb96f34]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] [ 7] /home/phargrov/OMPI/openmpi-1.7-latest-linux-ppc32/INST/lib/libmpi.so.1(MPI_Init+0x1e4)[0xfbdd878]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] [ 8] examples/ring_c[0x10000724]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] [ 9] /lib/libc.so.6(+0xfe0e0fc)[0x4806a0fc]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] [10] /lib/libc.so.6(+0xfe0e2a0)[0x4806a2a0]
</span><br>
<span class="quotelev1">&gt; [pcp-k-421:02573] *** End of error message ***
</span><br>
<span class="quotelev1">&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; mpirun noticed that process rank 1 with PID 2574 on node pcp-k-421 exited on signal 6 (Aborted).
</span><br>
<span class="quotelev1">&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Future Technologies Group
</span><br>
<span class="quotelev1">&gt; Computer and Data Sciences Department     Tel: +1-510-495-2352
</span><br>
<span class="quotelev1">&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Future Technologies Group
</span><br>
<span class="quotelev1">&gt; Computer and Data Sciences Department     Tel: +1-510-495-2352
</span><br>
<span class="quotelev1">&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<p><p><pre>
-- 
Jeff Squyres
jsquyres_at_[hidden]
For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="14116.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [PATCH] Re: Still having issues w/ opal_path_nfs and	EPERM"</a>
<li><strong>Previous message:</strong> <a href="14114.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] v1.7 and trunk: hello_oshmemfh link failure with	xlc/ppc32/linux"</a>
<li><strong>In reply to:</strong> <a href="14063.php">Paul Hargrove: "Re: [OMPI devel] v1.7.5a1: mpirun failure on ppc/linux (regression vs 1.7.4)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="14117.php">Ralph Castain: "Re: [OMPI devel] v1.7.5a1: mpirun failure on ppc/linux (regression	vs 1.7.4)"</a>
<li><strong>Reply:</strong> <a href="14117.php">Ralph Castain: "Re: [OMPI devel] v1.7.5a1: mpirun failure on ppc/linux (regression	vs 1.7.4)"</a>
<li><strong>Reply:</strong> <a href="14132.php">Paul Hargrove: "Re: [OMPI devel] v1.7.5a1: mpirun failure on ppc/linux (regression vs 1.7.4)"</a>
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
